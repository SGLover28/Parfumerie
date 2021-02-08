<?php
session_start();
$db=mysqli_connect('localhost','root','','parfumerie');
if (!$db)  {
      die("MySQL connection failed: ". mysqli_connect_error());
     
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
    <title>AjoutClient</title>
</head>

<body style="background-color: rgb(245, 232, 212);">
  
<nav class="navbar navbar-expand-lg navbar-light  ">
  <div class="container-fluid">
    <h1 class="navbar-brand">Dashboard</h1 >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
    </div>
  </div>
</nav>
  <div class="d-flex align-items-start changement">

  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <img class="logo" src="img/logo.png" alt="logo" width="270 px" >
     <div class="trait"> </div>
    <a class="nav-link "  href="dashboard.php" ><i class="fas fa-clipboard-list"  style="margin-right: 9px;"></i>Liste des clients</a>
    <a class="nav-link active"  href="ajoutClient.php"><i class="fas fa-address-book"style="margin-right: 9px;"></i>Ajout des clients</a>
    <a class="nav-link"  href="" ><i class="fas fa-cart-plus"style="margin-right: 9px;"></i>Gestion des commandes</a>
    <a class="nav-link"  href="" ><i class="fas fa-tasks"style="margin-right: 9px;"></i>Génération de factures</a>
    <a class="nav-link"  href=""><i class="fas fa-download"style="margin-right: 9px;"></i>Exportation liste de commandes</a>
    <a class="nav-link" href="connexion.php"><i class="fas fa-sign-out-alt" style="margin-right: 9px;"></i>Déconnexion</a>
  </div>
  
</div> 
    <div class="form-container">
    <h1>Ajouter un client</h1>
    <form class="formulaire form-floating mb-3" action="ajoutClient.php" method="POST">
         
     <input type="text"   placeholder="Nom" name="nom" required>
     <input type="text" placeholder="Prénom" name="prenom" required> 
     <input type="password" placeholder="Mot de passe" name="mdp" required>
     <input type="text" placeholder="Adresse postal" name="adpost" >
     <input type="text" placeholder="Facebook" name="fb" >
     <input type="text" placeholder="Instagram" name="insta">
     <input type="email" placeholder="Email" name="mail" required>
     <input type="text" placeholder="N°tel" name="tel">
     <input type="text" placeholder="Nombre de points" name="NbPoints">
     <input type="date" placeholder="Date d'expiration " name="expireDate" >

     <button class="btnClient reset" type="reset"name="reset" style="margin-top:60px">Refaire le formulaire</button>
     <button class="btnClient submit" type="submit"name="submitClient"  >Ajouter</button> 
     
     <input type="checkbox" name="ultimate"   value="ultimate" id="check7" class="checkbox" style="position :relative; top:-65px; left:-760px;   width:13px !important;padding: 0 !important;" > 
     <label class=" labelSize" for="check7" style="position :relative; top:-130px;left:40px"> Ultimate membership </label>
    </form>

    <?php
    if(isset($_POST['submitClient'])){
     
      if ((!empty($_POST["nom"]))&&(!empty($_POST["prenom"]))&&(!empty($_POST["mdp"]))&&(!empty($_POST["mail"]))) {
       
        $nom=$_POST["nom"]; 
      $prenom=$_POST["prenom"];
      $adpost=$_POST["adpost"]; 
      $fb=$_POST["fb"];  
      $insta=$_POST["insta"]; 
      $mail=$_POST["mail"]; 
      $tel=$_POST["tel"]; 
      $mdp=$_POST["mdp"]; 
      $nbpoints=$_POST["NbPoints"]; 
      $dateExp=$_POST["expireDate"]; 
      $sqlClient= "INSERT INTO client (NomClient,PrenomClient,AdressePostal,Facebook,Instagram,Email,NumTel, `isAdmin`, `MotDePasse`) VALUES ('$nom','$prenom','$adpost','$fb','$insta','$mail','$tel',0,'$mdp')";
      $resultClient=mysqli_query($db,$sqlClient);
      $codeClient=mysqli_insert_id($db);
    if ($resultClient){
      echo '<script language="javascript">';
      echo 'alert("client inséré !")';
      echo '</script>';
    }else {
      echo mysqli_error($db);
      echo '<script language="javascript">';
      echo 'alert("client non inséré !")';
      echo '</script>';
   
    }
    if(!empty($dateExp)){
    $phpdate = strtotime( $dateExp );
    $mysqldate = date( 'Y-m-d H:i:s',  $phpdate );
    }
    if(empty($nbpoints)) $nbpoints=0;
     if (empty($_POST["ultimate"])){
   $sqlMembership="SELECT * FROM cartefidelitemembership WHERE  $nbpoints BETWEEN NbPointsNiveauMin AND NbPointsNiveauMax";
   $membership=mysqli_query($db,$sqlMembership);
    $rowMembership=mysqli_fetch_array($membership);
    $nomMembership=$rowMembership["NomMembership"];}
    else $nomMembership="Ultimate";
    if(!empty($dateExp)){
    $sqlFidelite="INSERT INTO  `cartefidelite` (CodeClient,NbPoints,DateCreation,DateExpirationPoints,membership) VALUES ('$codeClient','$nbpoints',CURDATE(),'$mysqldate','$nomMembership') ";
    }
    else{
      $sqlFidelite="INSERT INTO  `cartefidelite` (CodeClient,NbPoints,DateCreation,membership) VALUES ('$codeClient','$nbpoints',CURDATE(),'$nomMembership') ";
    }
 
    $fidelite=mysqli_query($db, $sqlFidelite);
    if ($fidelite){
      echo '<script language="javascript">';
      echo 'alert("carte fidelité créée !")';
      echo '</script>';
    }else {
  
      echo '<script language="javascript">';
      echo 'alert("carte fidelité non créée !")';
      echo '</script>';
   
    }
    }
  }
    ?>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>