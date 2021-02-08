

<?php
$Connect = mysqli_connect( "127.0.0.1", "root", "", "parfumerie");
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
//Tout le long de cette page nous allons générer une string query qui modifiera les tables commande, produit, cadeau, produitcommande et cadeaucommande 

if(isset($_SESSION["query"])){  
    $Query = $_SESSION["query"];

    if($Connect->multi_query($Query)){
        echo "La commande est bien passée";
    }else{
        echo"pb avec dans le passage de la commande:\n ". mysqli_error($Connect);
    }
    $_SESSION["query"] =NULL;

}else{

    //nous determinons le numclient vis-à-vis des informations que nous avons reçues en post
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
    $Query ="";
    //nous calculons le nombre d'items que nous avons grâce au nombre de d'informations envoyées en post
    $nbItemCommande =(count($_POST)-2)/2;
    $i =0;
    //on regarde l'ensemeble d'article, ie produit, dans la commande.
   while(isset($_POST['article'.$i])){
        $name = "article".$i;
        $qte = $name."qte";
        
        
        echo "<div>$_POST[$name] $_POST[$qte]</div>";
        $auj = "".date("Ymd");
         //calcul coût commande:
         $nomProduits[$i] = $_POST[$name];
         $listQtes[$i] = $_POST[$qte]; 
         $Qpropduit = "SELECT `PrixAchat`, `numproduit`, `stockProduit`  FROM `produit` where `nomProduit`= '$nomProduits[$i]'";
         
        if($Rproduits = $Connect->query($Qpropduit)){
        $Rproduit = mysqli_fetch_row($Rproduits);
         $prix =  $Rproduit[0];
         $prixTt = $prixTt +  $prix* $listQtes[$i];
         echo "Le prix des ".$nomProduits[$i]." est de :".$prixTt."€ total \n";
        if($_POST[$qte]> $Rproduit[2]){
            echo "Mais il ne nous en reste pas assez en stock";
        }else{
         //cherchons la prochaine commande
        $QnumCommande = "Select `numCommande` from `commande` order by `numcommande` desc limit 1 ";

       if($RnumCom = $Connect->query($QnumCommande)){

        $numComm = mysqli_fetch_row($RnumCom)[0]+1 ;

        $StockActuel= $Rproduit[2] - $_POST[$qte];
        $Query .= "Insert into produitcommande values (".$numComm.",".$Rproduit[1].",". $listQtes[$i].",". $Rproduit[0].");"; 
        $Query .= "Update produit set StockProduit =".$StockActuel." where numProduit =".$Rproduit[1].";"  ;
    }else{
           echo mysqli_error;
       }
    }
    }else{
         echo "nous ne proposons pas ce produit";

        }
        $i++;
    }
    $pointsCons =0;
    $pointsConsTt=0;
    //nous faisons de même avec les cadeaux
    while($i <$nbItemCommande ){
        $name = "Cadeau".$i;
        $qte = $name."qte";
        
        
        echo "<div>$_POST[$name] $_POST[$qte]</div>";
        $auj = "".date("Ymd");
         //calcul coût commande:
         $nomCadeau[$i] = $_POST[$name];
         $listQtes[$i] = $_POST[$qte]; 
         $Qpropduit = "SELECT `nbPointCadeau`, `numCadeau`, `stockCadeau`  FROM `cadeau` where `NomProduit`= '$nomCadeau[$i]'";
         
        if($Rproduits = $Connect->query($Qpropduit)){
        $Rproduit = mysqli_fetch_row($Rproduits);
         $pointsCons =  $Rproduit[0];
         $pointsConsTt = $pointsConsTt +  $pointsCons* $listQtes[$i];
         echo "Le nombre de points consommés des ".$nomCadeau[$i]." est de :".$pointsConsTt." points total \n";
        if($_POST[$qte]> $Rproduit[2]){
            echo "Mais il ne nous en reste pas assez en stock";
        }else{
         //cherchons la prochaine commande
        $QnumCommande = "Select `numCommande` from `commande` order by `numcommande` desc limit 1 ";

       if($RnumCom = $Connect->query($QnumCommande)){

        $numComm = mysqli_fetch_row($RnumCom)[0]+1 ;

        $StockActuel= $Rproduit[2] - $_POST[$qte];
        $Query .= "Insert into cadeaucommande values (".$numComm.",".$Rproduit[1].",". $listQtes[$i].");"; 
        $Query .= "Update cadeau set StockCadeau =".$StockActuel." where numCadeau =".$Rproduit[1].";"  ;
    }else{
           echo mysqli_error;
       }
    }
    }else{
         echo "nous ne proposons pas ce produit";

        }
        $i++;
    }

    }


    $pointsG = (int) $prixTt / 10; 

    $pointsG = $pointsG -$pointsConsTt;
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

        $QpointsAjout = "Update cartefidelite Set nbpoints=".$pointTT." where codeClient=".$numClient; 
    }


    $Query = "INSERT INTO `COMMANDE` (`CodeClient`, `DateCommande`, `MontantTotalCommande`, `FraisLivraison`,`FraisService`, `nbPointsGagnes`,`pointsTotals`) values(".$numClient.",".$auj.",".$prixTt.",".$fraisLivraison.",".$fraisService.",".$pointsG.",".$pointTT.");".$Query.$QpointsAjout;
    
    echo $Query."Validez vous ?";
    
    $_SESSION['query'] = $Query;

    echo "<form action ='?' method ='post'>
        <button>Valider?</button> 
    </form>
    
    <form action='gestionCommande.php'>
         <button> Annuler</button>
    </form>";
    

}


}



?>