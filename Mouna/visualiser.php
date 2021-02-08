<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");
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

$membershipQuery="SELECT * FROM cartefidelitemembership where $nbFidelite BETWEEN NbPointsNiveauMin AND NbPointsNiveauMax";
$membership=mysqli_query($db, $membershipQuery);

if (!empty($membership)) {
    $rowMembership=mysqli_fetch_array($membership);
 }
}
$commandeClientQuery = "SELECT * FROM commande where CodeClient=  $idClient"; 
$commandeClient=mysqli_query($db, $commandeClientQuery);
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
      
    </div>
  </div>
</nav>
 <div class="d-flex align-items-start changement">

  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <img class="logo" src="logo.png" alt="logo" width="270 px" >
     <div class="trait"> </div>
    <a class="nav-link "  href="dashboard.php" ><i class="fas fa-clipboard-list"  style="margin-right: 9px;"></i>Liste des clients</a>
    <a class="nav-link"  href="ajoutClient.php"><i class="fas fa-address-book"style="margin-right: 9px;"></i>Ajout des clients</a>
    <a class="nav-link"  href="" ><i class="fas fa-cart-plus"style="margin-right: 9px;"></i>Gestion des commandes</a>
    <a class="nav-link"  href="" ><i class="fas fa-tasks"style="margin-right: 9px;"></i>Génération de factures</a>
    <a class="nav-link"  href=""><i class="fas fa-download"style="margin-right: 9px;"></i>Exportation liste de commandes</a>
    <a class="nav-link" href="connexion.php"><i class="fas fa-sign-out-alt" style="margin-right: 9px;"></i>Déconnexion</a>
  </div>
  
</div> 
<div class="nomPrenom">
<H1 >
<?php echo $rowProfil["NomClient"] ,'  ' ,$rowProfil["PrenomClient"]  ?>
</H1>
</div>


  
<div class="table-responsive table--no-card m-b-40" style="width: 1250px; margin-left:280px; margin-top:70px;">
        <table class="table table-borderless table-striped table-earning">
           
            <thead>
                <tr>
                    <th>Adresse Postal</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th class="text-right">Email</th>
                    <th class="text-right">Téléphone</th>
                    <th class="text-right">Nombre de points</th>
                    <th class="text-right">Membership</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                       <td><?php echo $rowProfil["AdressePostal"] ?></td>
                        <td><?php echo $rowProfil["Facebook"] ?></td>
                        <td><?php echo  $rowProfil["Instagram"] ?></td>
                        <td class="text-right"><?php echo   $rowProfil['Email'] ?></td>
                        <td class="text-right"><?php echo   $rowProfil['NumTel'] ?></td>
                        <td class="text-right"><?php echo   $rowFidelite['NbPoints'] ?></td> 
                        <td class="text-right"><?php echo    $rowMembership['NomMembership'] ?></td> 
                  
                </tr>
       
        </tbody>
       
        </table>
        
       
</div>
<?php echo '<a class="btn" href="modifier.php?id='.$idClient.'"style="margin-left:900px;margin-bottom:70px">Modifier</a>'?>

        <h2 class="titreTab">Toutes les commandes effectuées par ce client</h2>   
<div class="table-responsive table--no-card m-b-40" style="width: 1250px; margin-left:280px">
        <table class="table table-borderless table-striped table-earning">
           
            <thead>
                <tr>
                    <th>N° commande</th>
                    <th>DateCommande</th>
                    <th>MontantTotalCommande</th>
                    <th class="text-right">nbPointsGagnes</th>
                    <th class="text-right">pointsTotals</th>
                    <th class="text-right">StatutCommande</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php if(!empty ($commandeClient)){
                while ($rowCommande=mysqli_fetch_array($commandeClient)) { 
                       
                        ?>
                       <td><?php echo $rowCommande["NumCommande"] ?></td>
                        <td><?php echo $rowCommande["DateCommande"] ?></td>
                        <td><?php echo  $rowCommande["MontantTotalCommande"] ?></td>
                        <td class="text-right"><?php echo   $rowCommande['nbPointsGagnes'] ?></td>
                        <td class="text-right"><?php echo  $rowCommande['pointsTotals'] ?></td>
                        <td class="text-right"><?php echo   $rowCommande['StatutCommande'] ?></td> 
                </tr>
        <?php }} ?>
        </tbody>
       
        </table>
 
        </div>  
    
       


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>