<?php
$Connect = mysqli_connect( "127.0.0.1", "root", "", "tdparfumerie-2");
if(!$Connect){echo"erreur connexion";
    
    }else{
    if ($result = $Connect->query("SELECT DATABASE()")) {
        $row = $result->fetch_row();
        echo $row[0];
    }else{
        echo "non connext";
    
}
session_start();

$fraisLivraison = 5;
$fraisService = 1;


if(isset($_SESSION["query"])){  
    $Query = $_SESSION["query"];
    //echo $Query."\n";
    if($Connect->query($Query)){
        echo "La commande est bien passée";
    }else{
        echo"pb avec dans le passage de la commande:\n ". mysqli_error($Connect);
    }
    $_SESSION["query"] =NULL;

}else{
    $nomClient = $_POST["nom"];
    $prenomClient =  $_POST["prenom"];
    $QNom = "Select `CodeClient` from `client` where `NomClient` = '$nomClient' AND PrenomClient ='$prenomClient'";
    echo $QNom;
    
    $rn = $Connect->query($QNom);
    if(!$rn){
    echo "le nom du client n'existe pas";
    }else{
    $numClient = mysqli_fetch_row($rn)[0];
    $prixTt =0;

    for($i=0; $i<(count($_POST)-2)/2; $i++){
        $name = "article".$i;
        $qte = $name."qte";
        echo "<div>$_POST[$name] $_POST[$qte]</div>";
        $auj = "".date("Ymd");
         //calcul coût commande:
         $nomProduit = $_POST[$name]; 
         $Qprix = "SELECT `PrixAchat` FROM `produit` where `designation`= '$nomProduit'";
         echo $Qprix;
         if(!$Connect->query($Qprix)){
             echo "nous ne proposons pas le produit : ".$nomProduit; 
            
         }else{
          $prix =  mysqli_fetch_row( $Connect->query($Qprix))[0];
         $prixTt = $prixTt +  $prix* $_POST[$qte];
         echo "Le prix des ".$nomProduit." est de :".$prixTt."€ total \n";
         
        }
    }


    $pointsG = (int) $prixTt / 10; 
    $prixTt = $prixTt + $fraisLivraison + $fraisService;
    echo "Avec les frais de services et de livraison : ".$prixTt;


    //calcul des points de fidelité


    $QpointsTT = "Select nbpoints, NumCarteFidelite from cartefidelite where codeClient =".$numClient;
    $rp = $Connect->query($QpointsTT);
    if(!$rp){
        echo "nous ne trouvons pas le total des points de fidelité"; 
        $pointTT = 0;
    } 
    else{
        $pointTT = mysqli_fetch_row($rp)[0];
        $numCart = mysqli_fetch_row($rp)[1];

       

        $pointTT = $pointTT +$pointsG;

        $QpointsAjout = "Update cartefidelite Set nbpoints=".$pointTT." where codeClient=".$numClient.""; 
    }


    $Query = "INSERT INTO `COMMANDE` (`CodeClient`, `DateCommande`, `MontantTotalCommande`, `FraisLivraison`,`FraisService`, `nbPointsGagnes`,`pointsTotals`) values(".$numClient.",".$auj.",".$prixTt.",".$fraisLivraison.",".$fraisService.",".$pointsG.",".$pointTT.")";
    
    echo $Query."Validez vous ?";
    
    $_SESSION['query'] = $Query;

    echo "<form action ='?' method ='post'> 

    
    <button>
    Valider?
    </button> 
    </form>
    
    <form action='gestionCommande.php'>
    <button>
    Annuler
    </button>
    </form>
    ";
    

}


}}

?>