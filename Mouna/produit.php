<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");
if (isset($_GET['id'])) {
  $idProduit= $_GET['id'];                    
}

$identifiant=$_SESSION['identifiantClient'] ;
$clientQuery="SELECT * FROM client where Email='$identifiant'";
$client=mysqli_query($db,$clientQuery);
$rowclient=mysqli_fetch_array($client);
$idClient=$rowclient['CodeClient'];
$fideliteQuery= "SELECT * from cartefidelite WHERE CodeClient=$idClient" ;
$fidelite=mysqli_query($db,$fideliteQuery);
$rowFidelite=mysqli_fetch_array($fidelite);
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://kit.fontawesome.com/58f1dd562a.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: #f1f1f1;">

    <nav class="navbar navbar-expand-lg navbar-light colorModif  ">
        <div class="container-fluid">
            <img class="logo" src="img/LOGO-BLANC.png" alt="logo" width="150 px">

            <ul class="navbarChange">
        <li><?php echo$rowFidelite["NbPoints"] ?><i class="fas fa-star"></i> </li>

        <li><i class="fas fa-shopping-cart"></i></li>
        <li><?php echo $rowclient['NomClient'] ," ", $rowclient['PrenomClient'] ?></li>
        <li><a href="profil.php" style="color: rgb(255, 255, 255);"><i class="fas fa-user-circle"></i></a></li>
        <li> <a href="connexion.php" style="color: rgb(255, 255, 255);"> <i class="fas fa-sign-out-alt"></i></a></li>

      </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light nav2 ">
        <div class="container-fluid">


            <div class="collapse navbar-collapse" id="navbarNav">
                <div id="myHeader" style="background-color: #f1f1f1;">

                    <ul class="navbar-nav linav2">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Nouveautés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Sélections</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page_cadeau.php">Cadeaux</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="page_parfum.php">Parfums</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="page_maquillage.php">Maquillages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contactez-nous</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="produit">
      <form action="produit.php" method="POST">
      <input id="id" name="id" type="hidden"  value=<?php echo $idProduit?>>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <?php header('Content-Type: charset=utf-8');
                     $produitquery= "SELECT * FROM `produit`  where NumProduit= $idProduit";
                      $produit=mysqli_query($db, $produitquery);
                    
                      $rowproduit=mysqli_fetch_array( $produit)
                      
                       ?>
                         <input id="prix" name="prix" type="hidden"  value=<?php echo $rowproduit['PrixAchat']?>>
                    <img width="640px" height="480px" src="<?php echo htmlspecialchars($rowproduit['ImageProduit']); ?>"
                        alt="<?php echo $rowproduit['NomProduit'] ?>" />

                </div>
                <div class="col-sm-5" style="margin-left:50px;">

                    <h1 class="nom_produit"><?php echo $rowproduit['NomProduit']?></h1>
                    <h3 class="type_produit"><?php echo $rowproduit['TypeProduit']?></h3>
                    <h4>Stock: <?php echo $rowproduit['StockProduit']?> </h4>

                    <div class="prixproduit">
                        <ul>
                            <li style="margin-right: 90px;margin-left: 30px;font-size: 21px;">
                                <p><?php echo $rowproduit['VolumeProduit']?> ml/g</p>
                            </li>
                            <li style="font-size: 21px;">
                                <p><?php echo $rowproduit['PrixAchat']?> €</p>
                            </li>
                            <li style="margin-right: 40px;" class="modif"><input class="modif" type="number" min="1" max="10000" step="1" id="input-number" placeholder="quantité" name="quantite" required></li>
                            <?php if ( $rowproduit['StockProduit']==0 ){ ?>
                            <li><button class="btn modif" name="submit" disabled>Acheter</button></li>
                            <?php } else {?>
                             <li><button class="btn modif" name="submit">Acheter</button></li>
                             <?php } ?>
                        </ul>

                    </div>
                    <div class="trait_nouveaute" style="height: 3px;width:470px ; background-color:#282e34;position:relative;top: -37px;"></div>
                </div>

            </div>
            <div class="row">
              
              <div class="parag">
              
                <div style="margin-top: 60px;" >
      
                  <div class="trait_nouveaute" style="height: 5px;  background-color:#282e34;position:relative;top: 50px;"></div>
                  <div style="background-color:#f1f1f1; height: 30px; width: 250px;position:relative; top: 40px; margin-left: 620px;" ></div>
                  <h2 style="margin-bottom: 30px;position:relative;" >Description</h2>
                  <hr>
                  <div class="trait_nouveaute" style="height: 5px; width: 240px; background-color:#282e34;position:relative;left: 630px;top: -22px;"></div>
                </div>
                <div style="height: 80px;padding:20px;  background-color:rgb(153, 33, 51);"> <h2 style="text-align:center;color:#f1f1f1" ><?php echo $rowproduit['NomProduit']?></h2></div>
                <p class="designation_produit"><?php echo $rowproduit['Designation']?></p>
                
                
                </div> 
              </div>
              
            </div>
        </div>
        </form>
    </div>
   


    <?php 
 
if (isset($_POST['submit'])){
       $quantite=$_POST['quantite'];

       $idProduit=$_POST['id'];
      $prix=$_POST['prix'];

    //   tester si la quantité est suffisante ou pas
      $stockquery="SELECT * FROM produit WHERE NumProduit=$idProduit";
      $stock=mysqli_query($db,$stockquery);
      $rowStock=mysqli_fetch_array($stock);
      $stockRec=$rowStock['StockProduit'];
      $newStock=$stockRec-$quantite;
if ($newStock<0){
    echo '<script language="javascript">';
    echo 'alert("le stock est épuisé il reste que '.$stockRec.' exemplaires")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0;URL=produit.php?id='.$idProduit.'">';
 

}else{
    if ($newStock==0) {
        $StringStock="épuisé";
        $updateStockQuery="UPDATE `produit` SET `StockProduit`='$newStock',`Status`='$StringStock' WHERE NumProduit='$idProduit' ";
       $updateStock=mysqli_query($db,$updateStockQuery);
    }else{
    $updateStockQuery="UPDATE `produit` SET `StockProduit`='$newStock' WHERE NumProduit='$idProduit' ";
    $updateStock=mysqli_query($db,$updateStockQuery);}

    $prixTotal=$prix * $quantite;
    $identifiant=$_SESSION['identifiantClient'];
    $clientquery="SELECT * FROM client WHERE Email='$identifiant'";
    $client=mysqli_query($db,$clientquery);
    $rowclient=mysqli_fetch_array($client);
    $codeclient=$rowclient['CodeClient'];
    $nbTotalCumQuery="SELECT * FROM cartefidelite WHERE CodeClient ='$codeclient'";
    $nbTotalCum=mysqli_query($db,$nbTotalCumQuery);
    $rownbTotalCum=mysqli_fetch_array($nbTotalCum);
    $nbTotal=$rownbTotalCum['NbPoints'];
    $nbpointenTotal= $nbTotal + $prixTotal;

    $updateMembershipQuery="SELECT * FROM cartefidelitemembership WHERE $nbpointenTotal BETWEEN NbPointsNiveauMin AND NbPointsNiveauMax";
    $updateMembership=mysqli_query($db,$updateMembershipQuery);
    $rowMembership=mysqli_fetch_array($updateMembership);
    $nomMembership=$rowMembership["NomMembership"];

  $sqlQuery="UPDATE `cartefidelite` SET `NbPoints`='$nbpointenTotal',`membership`='$nomMembership' WHERE CodeClient ='$codeclient' ";
  $sql=mysqli_query($db,$sqlQuery);

  $commandequery= "INSERT INTO `commande`(`CodeClient`, `DateCommande`, `MontantTotalCommande`, `nbPointsGagnes`, `pointsTotals`, `StatutCommande`) VALUES ('$codeclient',CURDATE(),'$prixTotal','$prixTotal','$nbpointenTotal',''passée'')";
  $commande=mysqli_query($db,$commandequery);

  $codeCommandeProduit=mysqli_insert_id($db);

  $commandeLignequery= "INSERT INTO `produitcommande`(`NumCommande`, `NumProduit`, `QuantiteCommandee`, `PrixUnitaire`) VALUES ('$codeCommandeProduit','$idProduit','$quantite','$prix')";
  $commandeLigne=mysqli_query($db, $commandeLignequery);

  $factureQuery="INSERT INTO `facture`( `NumCommande`, `DateFacture`) VALUES ('$codeCommandeProduit',CURDATE())";
  $facture=mysqli_query($db,$factureQuery);

  $modePaiementQuery="INSERT INTO `reglement`( `NumCommande`, `ModePaiement`, `Montant`, `DatePaiement`, `Observation`) VALUES ('$codeCommandeProduit','cash',' $prixTotal',CURDATE(),'')";
  $modePaiement=mysqli_query($db,$modePaiementQuery);

 

    echo '<script language="javascript">';
    echo 'alert("Vous venez de passer une commande d\'un  montant total='.$prixTotal.'! et vous avez cumulez en tout'.$nbpointenTotal.'")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
 

      
}}

?>
    
    <footer id="contact">
    
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-4">
                    <div class="local">
                        <h1>NOTRE BOUTIQUE</h1>
                        <P>Adresse : 1 BD Charles</P>
                        <p> Le Mans, France 72000</p>
                        <p> Tél : 01 23 45 67 89</p>
                        <p> E-mail : info@monsite.fr</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="horaire">
                        <h1>HORAIRES</h1>
                        <p>Lun - Ven : 7 h - 22h</p>
                        <p>​​Samedi : 8h - 22h</p>
                        <p>​Dimanche : 8h - 23h</p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="aide">
                        <h1>AIDE</h1>
                        <a href="#">Livraisons et retours</a><br>
                        <a href="#">FAQ</a><br>
                        <a href="#">Mentions légales</a><br>
                        <a href="#">Politique en matière de cookies</a><br>
                        <a href="#">Politique de confidentialité</a><br>
                        <a href="#">Conditions d’utilisation</a>


                    </div>
                </div>
            </div>
            <div class="resoc">
                <img src="img/insta.png" alt="insta" width=3%>
                <img src="img/twitter.png" alt="twitter" width=3% style="margin-left: 40px;">
                <img src="img/fb.png" alt="fb" width=7%>
            </div>
    </footer>

    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>


</body>

</html>