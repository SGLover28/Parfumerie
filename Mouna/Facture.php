



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/58f1dd562a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Dashboard</title>
    <script type="text/javascript">
    var larg, haut;

    haut = (document.body.clientHeight);



    var d = document.getElementByClassName("changement");

    d.style.height = haut + "px";
    </script>
</head><?php
$Connect = mysqli_connect( "127.0.0.1", "root", "", "parfumerie");
if(!$Connect){
    echo"erreur connexion";
    
    }




$QueryCommande ="Select * from Commande where numCommande =".$_POST['IdCommande'];
if($ResultatDemandeCommande =$Connect->query($QueryCommande)){
    $infoCommande =  mysqli_fetch_row($ResultatDemandeCommande);

    $QueryClient = "Select * from client where CodeClient =".$infoCommande[1];
    if($ResultatDemandeClient = $Connect->query($QueryClient)){
    $infoClient =  mysqli_fetch_row($ResultatDemandeClient);
    $auj = "".date("Ymd");
    
    $QCreerFacture = "Insert into Facture (numCommande, DateFacture) values ($infoCommande[0], $auj)";

    $Connect->query($QCreerFacture);

    $QueryNumFacture = "Select numFacture, dateFacture from facture where numCommande =$infoCommande[0]";

    $ResultatFacture =  $Connect->query($QueryNumFacture);
    $numFacture = mysqli_fetch_row($ResultatFacture);

    echo"<div class='table-responsive table--no-card m-b-40' style='width: 600px; margin-left:1000px'><table > <tr><td> Facebook : $infoClient[4]</td> </tr> <tr> <td> E mail : $infoClient[6] </td> </tr> <tr> <td> Numéro de téléphone : $infoClient[7] </td> </tr>
     <tr> <td> Addresse : $infoClient[3] </td> </tr> 
     <tr> <td> Nom : $infoClient[1] </td> </tr>  
     <tr> <td> Prenom : $infoClient[2] </td> </tr>
     <tr> <td> Code Client: $infoClient[0] </td> </tr>  </table>
     </div>
     <H1> Facture </h1>

        <div >
     <table style='width: 1200px; margin-left:30px'>
     <tr> <td> No. Commande : $infoCommande[0]</td> </tr>
     <tr> <td> Date Commande : $infoCommande[2]</td> </tr> 
     
     <tr> <td> No. Facture : $numFacture[0] </td> </tr>
     <tr> <td> Date Facture : $numFacture[1] </td> </tr>
     </table></div>
     ";

     //Determinons les valeurs de la facture

     $QueryProduitCommande = "Select * from produitCommande where numCommande = $infoCommande[0]";
        $Tt=0;
     if($RQueryProduitCommande = $Connect->query($QueryProduitCommande)){
         echo " <table> <th>No. <td>Produit</td>  <td> Quantité  </td> <td> Prix Unité</td> <td>Prix Total</td></th>";
         $i=0;
         while($infoProduitCommande = mysqli_fetch_row($RQueryProduitCommande)){
            $i++; 
            $QnomProduit = "Select NomProduit from produit where numProduit = $infoProduitCommande[1]";
            $RnomProduit = $Connect->query($QnomProduit);

            $designation = mysqli_fetch_row($RnomProduit)[0];
            $total = $infoProduitCommande[2] *$infoProduitCommande[3];
            $Tt += $total;
            echo "<tr> <td> $i</td> <td> $designation</td> <td> $infoProduitCommande[2]</td> <td>  $infoProduitCommande[3]</td> <td> $total</td> </tr>";

             
         }
         echo " </table><tr> Montant total : $Tt</tr> "; 

         
     }
    
}else{
    echo "nous ne trouvons pas le client";
}



}else{
    echo"Nous n'avons pas trouver la commande ". mysqli_error($Connect);
}



?>