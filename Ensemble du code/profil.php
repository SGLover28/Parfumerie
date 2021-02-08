<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");
$identifiant=$_SESSION['identifiantClient'] ;

$profilClientQuery = "SELECT * FROM client where Email='$identifiant'"; 
$profilClient=mysqli_query($db, $profilClientQuery);
$rowProfil=mysqli_fetch_array($profilClient);
$idClient=$rowProfil['CodeClient'];
$fideliteQuery= "SELECT * from cartefidelite WHERE CodeClient=$idClient" ;
$fidelite=mysqli_query($db,$fideliteQuery);
$rowFidelite=mysqli_fetch_array($fidelite);
$fideliteClientQuery = "SELECT * FROM cartefidelite where CodeClient=  $idClient"; 

$fideliteClient=mysqli_query($db,$fideliteClientQuery);

$rowFidelite=mysqli_fetch_array($fideliteClient); 
$exemple=$rowFidelite['NbPoints'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/58f1dd562a.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      
  
    <title>Profil</title>
</head>
<body>
    <style>
 .navbarChange li, .linav2 li{
    display: inline-block;
    padding: 0px 7px;
    color: rgb(255, 255, 255);
    font-size: 18px;
    font-family: Futura,Trebuchet MS,Arial,sans-serif; 
}
.navbarChange{
    margin-top: 14px;
    position: absolute;
    right: 0;
    margin-right:10px ;
}
    </style>
<nav class="navbar navbar-expand-lg navbar-light colorModif" style=" background-color:#282e34 ;height: 54px;">

    <div class="container-fluid">
      <img class="logo" src="img/LOGO-BLANC.png" alt="logo" width="150 px">

      <ul class="navbarChange">
        <li><?php echo$rowFidelite["NbPoints"] ?><i class="fas fa-star"></i> </li>

        <li><i class="fas fa-shopping-cart"></i></li>
        <li><?php echo $rowProfil['NomClient'] ," ", $rowProfil['PrenomClient'] ?></li>
        <li><i class="fas fa-user-circle"></i></li>
        <li> <a href="connexion.php" style="color: rgb(255, 255, 255);"> <i class="fas fa-sign-out-alt"></i></a></li>


      </ul>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
       
      </div>
      </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-light nav2 ">
    <div class="container-fluid">


      <div class="collapse navbar-collapse" id="navbarNav">
        <div id="myHeader" style="background-color: white;">

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
              <a class="nav-link" href="page_parfum.php">Parfums</a>
            
            </li>
            <li class="nav-item">
              <a class="nav-link" href="page_maquillage">Maquillages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contactez-nous</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
        
        
        
                <div style="margin:30px">
               <form >
            
        <div class="input-group mb-3">
          <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px" >Nom</span>
          <?php echo '<input type="text" class="form-control" id="nom" name="nom" value="'.$rowProfil["NomClient"].'"  disabled>'?>
        </div>
        <div class="input-group mb-3">
        <span class="input-group-text"style="background-color: rgb(153, 33, 51);color:white;width:170px">Prenom</span>
          <?php echo '  <input type="text" class="form-control" id="prenom" name="prenom" value="'.$rowProfil["PrenomClient"].'" disabled>'?>
          </div>
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Adresse postal</span>
        <?php echo '  <input type="text" class="form-control" id="adressePostal" value="'.$rowProfil["AdressePostal"].'" name="adressePostal" disabled >'?>
          </div> 
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Facebook</span>
        <?php echo '  <input type="text" class="form-control" id="Facebook"   value="'.$rowProfil["Facebook"].'" name="Facebook" disabled>'?>
          </div> 
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Instagram</span>
        <?php echo '  <input type="text" class="form-control" id="Instagram" value="'.$rowProfil["Instagram"].'" name="Instagram" disabled >'?>
          </div> 
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Email</span>
        <?php echo '  <input type="text" class="form-control" id="Email"   value="'.$rowProfil["Email"].'" name="Email" disabled>'?>
          </div> 
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">N° tel</span>
        <?php echo '  <input type="text" class="form-control" id="NumTel" value="'.$rowProfil["NumTel"].'" name="NumTel" disabled >'?>
          </div> 
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Nombre de points</span>
        <?php echo '  <input type="text" class="form-control" id="NbPoints"  value="'.$rowFidelite["NbPoints"].'" name="NbPoints"  disabled>'?>
          </div>  
          <div class="input-group mb-3">
        <span class="input-group-text" style="background-color: rgb(153, 33, 51);color:white;width:170px">Membership</span>
        <?php echo ' <input type="text" class="form-control" id="NbPoints"  value="'.$rowFidelite["membership"].'" name="NbPoints" disabled >'?>
       
          </div>
               </form>
                </div>
        
</body>
</html>