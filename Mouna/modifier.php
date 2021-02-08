<?php
session_start();
  $db=mysqli_connect('localhost','root','','parfumerie');
 if(mysqli_connect_errno()) {
  die("MySQL connection failed: ". mysqli_connect_error());
 }
if (isset($_GET['id'])) {
    $idClient= $_GET['id'];                    
}
$profilClientQuery = "SELECT * FROM client where CodeClient=  $idClient"; 
$profilClient=mysqli_query($db, $profilClientQuery);
$rowProfil=mysqli_fetch_array($profilClient);
$fideliteClientQuery = "SELECT * FROM cartefidelite where CodeClient=  $idClient"; 
$fideliteClient=mysqli_query($db, $fideliteClientQuery);

if(!empty($fideliteClient)){
$rowFidelite=mysqli_fetch_array($fideliteClient);  
$nbFidelite= $rowFidelite['NbPoints'];


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/58f1dd562a.js" crossorigin="anonymous"></script> 
  <link rel="stylesheet" type="text/css" href="dashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body style="background-color: rgb(245, 232, 212);">
<nav class="navbar navbar-expand-lg navbar-light  ">
  <div class="container-fluid">
    <h1 class="navbar-brand">Dashboard</h1 >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
<H1 style="color:rgb(231, 224, 224);margin-left:290px">
<?php echo $rowProfil["NomClient"] ,'  ' ,$rowProfil["PrenomClient"]  ?>
</H1>

    </div>
    
  </div>
</nav>
 <div class="d-flex align-items-start changement">

  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <img class="logo" src="img/logo.png" alt="logo" width="270 px" >
     <div class="trait"> </div>
    <a class="nav-link "  href="dashboard.php" ><i class="fas fa-clipboard-list"  style="margin-right: 9px;"></i>Liste des clients</a>
    <a class="nav-link"  href="ajoutClient.php"><i class="fas fa-address-book"style="margin-right: 9px;"></i>Ajout des clients</a>
    <a class="nav-link"  href="" ><i class="fas fa-cart-plus"style="margin-right: 9px;"></i>Gestion des commandes</a>
    <a class="nav-link"  href="" ><i class="fas fa-tasks"style="margin-right: 9px;"></i>Génération de factures</a>
    <a class="nav-link"  href=""><i class="fas fa-download"style="margin-right: 9px;"></i>Exportation liste de commandes</a>
    <a class="nav-link" href="connexion.php"><<i class="fas fa-sign-out-alt" style="margin-right: 9px;"></i>Déconnexion</a>
  </div>
  
</div> 



        <div class="form-containerModif">
       <form  action="modifier.php" method="POST">
       <input id="idRec" name="idRec" type="hidden"  value=<?php echo $rowProfil["CodeClient"]?>>
<div class="input-group mb-3">
  <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px" >Nom</span>
  <?php echo '<input type="text" class="form-control" id="nom" name="nom" value="'.$rowProfil["NomClient"].'" >'?>
</div>
<div class="input-group mb-3">
<span class="input-group-text"style="background-color: rgb(153, 33, 51);color:white;width:170px">Prenom</span>
  <?php echo '  <input type="text" class="form-control" id="prenom" name="prenom" value="'.$rowProfil["PrenomClient"].'">'?>
  </div>
  <div class="input-group mb-3">
<span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Adresse postal</span>
<?php echo '  <input type="text" class="form-control" id="adressePostal" value="'.$rowProfil["AdressePostal"].'" name="adressePostal" >'?>
  </div> 
  <div class="input-group mb-3">
<span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Facebook</span>
<?php echo '  <input type="text" class="form-control" id="Facebook"   value="'.$rowProfil["Facebook"].'" name="Facebook" >'?>
  </div> 
  <div class="input-group mb-3">
<span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Instagram</span>
<?php echo '  <input type="text" class="form-control" id="Instagram" value="'.$rowProfil["Instagram"].'" name="Instagram"  >'?>
  </div> 
  <div class="input-group mb-3">
<span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Email</span>
<?php echo '  <input type="text" class="form-control" id="Email"   value="'.$rowProfil["Email"].'" name="Email" >'?>
  </div> 
  <div class="input-group mb-3">
<span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">N° tel</span>
<?php echo '  <input type="text" class="form-control" id="NumTel" value="'.$rowProfil["NumTel"].'" name="NumTel"  >'?>
  </div> 
  <div class="input-group mb-3">
<span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Nombre de points</span>
<?php echo '  <input type="text" class="form-control" id="NbPoints"  value="'. $rowFidelite["NbPoints"].'" name="NbPoints"  >'?>
  </div>  
  <button class="btnClient reset" type="reset" name="reset">Refaire le formulaire</button>
  <button class="btnClient submit" type="submit" name="modifier" id="modifier" >Modifier</button>        
       </form>
        </div>


       
<?php 
 
if (isset($_POST['modifier'])){
       $nom=$_POST['nom'];
       $prenom=$_POST['prenom'];
       $adressePost=$_POST['adressePostal'];
       $facebook=$_POST['Facebook'];
       $instagram=$_POST['Instagram'];
       $mail=$_POST['Email'];
       $tel=$_POST['NumTel'];
      $nbpoints=$_POST['NbPoints'];
      $idClient=$_POST['idRec'];
        if($nom=='' && $prenom=='' && $tel==''&& $adressePost==''&& $facebook=='' && $instagram=='' && $mail=='' && $tel=='' && $nbpoints=='')
{

  
    echo '<script language="javascript">';
    echo 'alert("client non modifié !")';
    echo '</script>';
     echo '<meta http-equiv="refresh" content="0;URL=modifier.php?id='.$idClient.'">';

    //header("location:modifier.php?id='.$idClient.'")  ;

      
}
else
{                   
  $updateMembershipQuery="SELECT * FROM cartefidelitemembership WHERE $nbpoints BETWEEN NbPointsNiveauMin AND NbPointsNiveauMax";
  $updateMembership=mysqli_query($db,$updateMembershipQuery);
  $rowMembership=mysqli_fetch_array($updateMembership);
  $nomMembership=$rowMembership["NomMembership"];
 $rqt="UPDATE client SET NomClient='$nom',PrenomClient='$prenom',AdressePostal='$adressePost',Facebook='$facebook', Instagram='$instagram',Email='$mail',NumTel='$tel' where CodeClient=$idClient";


 $resultat=mysqli_query($db,$rqt);
 $rqt2=" UPDATE cartefidelite set NbPoints='$nbpoints',membership='$nomMembership' WHERE CodeClient=$idClient";
 $result2=mysqli_query($db,$rqt2);
if(!$result2 || !$resultat )
{
   echo '<script language="javascript">';
  echo 'alert("client non modifié !")';
  echo '</script>';
}else{


echo '<script language="javascript">';
echo 'alert("client  modifié !")';
echo '</script>';
echo '<meta http-equiv="refresh" content="0;URL=visualiser.php?id='.$idClient.'">';
//header("location:visualiser.php?id='.$idClient.'");
} } }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>