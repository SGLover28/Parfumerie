<?php
session_start();
$Connect = mysqli_Connect("127.0.0.1", "root", "", "parfumerie" );





if(isset($_POST['suprimer'])){

    $Q = 'Delete from commande where numcommande= '.$_SESSION['IdCommande'];
    if($Connect->query($Q)){
        echo "La commande est bien supprimée";
    }else{
        echo"pb avec dans la suppression de la commande:\n ". mysqli_error($Connect);
    }


}else{
if(!isset($_SESSION['query'])){
    $_SESSION['query']="";
}
if(!isset($_SESSION['pointsOriginalTt'])){
    $_SESSION['pointsOriginalTt'] =0;
}

$_SESSION += $_POST;

$nbQteActuel=0;
$nbQteOriginal =0;
$nbCadeauQteOriginal =0;
$nbCadeauQteActuel =0;
$EnsembleAEcho ="";





    if(isset($_SESSION['nbProduit'])){
    //ie nous avons déjà vu la page une fois, et elle a été modifiée
   
    for($i =0; $i<$_SESSION['nbProduit']; $i++ ){
        $nbQteOriginal += $_SESSION['qteOriginale'.$i];
        $nbQteActuel += $_SESSION['qte'.$i];
        if($_SESSION['qte'.$i] != $_SESSION['qteOriginale'.$i]){

            $_SESSION['query'] .= "Update produitcommande set quantitecommandee = ".$_SESSION['qte'.$i]." where numProduit =".$_SESSION['numProduit'.$i].";";
            $changementPrix = ($_SESSION['qteOriginale'.$i]-$_SESSION['qte'.$i]) * $_SESSION['prix'.$i] ;
            $changementPoint = (int)$changementPrix/10;
            $pointsOriginaux = ($_SESSION['prix'.$j] * $_SESSION['qteOriginal'.$j])/10;
            $POTt = $_SESSION['pointsOriginalTt'];
            $prixTt = $_SESSION['prixTt'];
            //Pour aider à lisibilité, nous mettons les différents updates sur plusieurs lignes
            $_SESSION['query'] .= "update commande set MontantTotalCommande = $prixTt - $changementPrix where numcommande =".$_SESSION['IdCommande']." ; ";
            $_SESSION['query'] .= "update commande set nbPointsGagnes = $PointsOriginaux - $changementPoint  where numcommande =".$_SESSION['IdCommande']." ; ";
            $_SESSION['query'] .= "update commande set pointsTotals = $POTt - $changementPoint  where numcommande =".$_SESSION['IdCommande']." ; ";
            
        }
        if(isset($_SESSION['suprimer'.$i])){
            $_SESSION['query'] .= "Delete from produitcommande where numProduit =".$_SESSION['numProduit'.$i]." AND numCommande = ".$_SESSION['IdCommande'].";";
            $nbQteActuel -= $_SESSION['qteOriginale'.$i];
        }

    }
}
    //De même pour les cadeaux
    if(isset($_SESSION['nbCadeau'])){
    for($j =0; $j<$_SESSION['nbCadeau']; $j++ ){
       $nbCadeauQteOriginal += $_SESSION['qteCadeauOriginale'.$j];
       $nbCadeauQteActuel += $_SESSION['qteCadeau'.$j];
       if($_SESSION['qteCadeau'.$j] != $_SESSION['qteCadeauOriginale'.$j]){

           $_SESSION['query'] .= "Update Cadeaucommande set quantitecommandee = ".$_SESSION['qteCadeau'.$j]." where numCadeau =".$_SESSION['numCadeau'.$j].";";
           $changementPoint = ($_SESSION['qteCadeauOriginale'.$j]-$_SESSION['qteCadeau'.$j]) * $_SESSION['points'.$j] ;
           $pointsOriginaux = $_SESSION['points'.$j] * $_SESSION['qteCadeauOriginale'.$j];
           $POTt = $_SESSION['pointsOriginalTt'];
           //$changementPoint = (int)$changementPrix/10;
           //Pour aider à lisibilité, nous mettons les différents updates sur plusieurs lignes
          // $_SESSION['query'] .= "update commande set MontantTotalCommande = (Select MontantTotalCommande from commande where numCommande = ".$_SESSION['idCommande'].") - $changementPrix where numcommande =".$_SESSION['idCommande']." ;";
           $_SESSION['query'] .= "update commande set nbPointsGagnes = $pointsOriginaux - $changementPoint  where numcommande =".$_SESSION['IdCommande']." ;";
           $_SESSION['query'] .= "update commande set pointsTotals = $POTt - $changementPoint where numcommande =".$_SESSION['IdCommande']." ;";
           
       }
       if(isset($_SESSION['suprimerCadeau'.$j])){
           $_SESSION['query'] .= "Delete from cadeaucommande where numCadeau =".$_SESSION['numcadeau'.$j]." AND numCommande = ".$_SESSION['IdCommande'].";";
           $nbQteActuel -= $_SESSION['qteCadeauOriginale'.$j];
       }

   }
}


if(isset($_SESSION["valider"])){  
    $Query = $_SESSION['query'];
    echo $Query;

    if($Connect->multi_query($Query)){
        echo "La commande est bien modifiée";
    }else{
        echo"pb avec dans le passage de la commande:\n ". mysqli_error($Connect);
    }
    

}else{




$QCommande = "Select * from produitCommande where numcommande = ".$_SESSION['IdCommande'];




if($RCommande = $Connect->query($QCommande)){
   
    $i=0;
    while($idProduit = mysqli_fetch_row($RCommande)){
        if($i==0){
            $EnsembleAEcho .= "<form method ='POST' action=''> <H1> Produit</H1> <table class= ''> <th> nom <td>prix<td>quantité </td><td>supp<td>";
        }

        $QListeProduit[$i] = " Select NomProduit, PrixAchat, stockProduit from produit where NumProduit = ".$idProduit[1];
        $_SESSION['qteOriginale'.$i] = $idProduit[2];
        
        $_SESSION['numProduit'.$i] = $idProduit[1];
        
        if($RListeProduit =  $Connect->query($QListeProduit[$i])){
            if(!isset($_SESSION['suprimer'.$i])){
              
            $infoProduit[$i] = mysqli_fetch_row($RListeProduit);
            $_SESSION['prix'.$i] = $infoProduit[$i][1];
            $_SESSION['prixTt'] += $infoProduit[$i][1] * $idProduit[2];
            $_SESSION['pointsOriginalTt'] +=   (int)($infoProduit[$i][1]*$idProduit[2])/10;
            $EnsembleAEcho .= "<tr><td> ". $infoProduit[$i][0]."</td><td>  ".$infoProduit[$i][1]."</td><td> <input type='number' name = 'qte$i' value =".$idProduit[2]." /><td>
            
            <input type='submit' name='suprimer$i' id='test' value='supprimer' /><br/>
            <td></tr>";
            }
        }    
        else{
            echo "pb de connect dans la liste produit";
        }
        $i++;

    }
    $EnsembleAEcho .= "</table>";
}else{
    echo "la commande n'a pas de produit";
}

  
    //De même pour les cadeaux de la commande
$QCommande = "Select * from `CadeauCommande` where `NumCommande` = ".$_SESSION['IdCommande'];



if($RCommande = $Connect->query($QCommande)){
    
    $j=0;
    while($idCadeau = mysqli_fetch_row($RCommande)){

        if($j==0){
            if($i==0){
                $EnsembleAEcho .= "<form method ='POST' action=''>";
            }
            $EnsembleAEcho .= "<H1> Cadeaux </H1> <table class= ''> <th> Cadeau <td>prix<td>quantité </td><td>supp<td>";
        }
        $QListeCadeau[$j] = " Select NomProduit, nbPointCadeau, stockCadeau from cadeau where NumCadeau = ".$idCadeau[1];
        $_SESSION['qteCadeauOriginale'.$j] = $idCadeau[2];
        $_SESSION['numCadeau'.$j] = $idCadeau[1];
        
        if($RListeCadeau =  $Connect->query($QListeCadeau[$j])){
            if(!isset($_SESSION['suprimerCadeau'.$j])){
            $infoCadeau[$j] = mysqli_fetch_row($RListeCadeau);
            $_SESSION['points'.$j] = $infoCadeau[$j][1];
            $EnsembleAEcho .= "<tr><td> ". $infoCadeau[$j][0]."</td><td>  ".$infoCadeau[$j][1]."</td><td> <input type='number' name = 'qteCadeau$j' value =".$idCadeau[2]." /><td>
            
            <input type='submit' name='suprimerCadeau$j' id='test' value='supprimer' /><br/>
            <td></tr> </table>";
            }
        }    
        else{
            echo "pb de connect dans la liste cadeau";
        }
        $j++;

    }

}
  
    $_SESSION['nbProduit'] = $i;
    $_SESSION['nbCadeau'] =$j;

    echo $EnsembleAEcho."<button type = 'submit' name ='valider'/>valider</form> ";
    
    echo "<form action = 'GestionCommande.php' method ='POST'><button name = 'annuler'type= 'submit'> annuler</button></form> ";
    
    echo "<form action = 'ModifierCommande' method ='POST' <button name = 'suprimer' type ='submit'> Supprimer la commande</button> </form> ";
   

}}
?>
