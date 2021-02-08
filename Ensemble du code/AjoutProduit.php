<?php
$Connect = mysqli_connect( "127.0.0.1", "root", "", "parfumerie");
if(!$Connect){echo"erreur connexion";
    
    }else{
    if ($result = $Connect->query("SELECT DATABASE()")) {
        $row = $result->fetch_row();
       
    }else{
        echo "non connext";
    
        }
}


session_start();
if(isset($_POST['ValiderAjout'])){

    if(isset($_POST['estCadeau'])){

        $nbPoint = $_POST['prixAchat'] *100;
        
    $Query ="Insert into cadeau (designation, stockCadeau, nbPointCadeau, StatusCadeau, ImageCadeau, CategorieCadeau, NomCadeau, TypeCadeau, VolumeCadeau) values ( '".
    $_POST['Designation']."',".
    $_POST['Stock'].",".
    $nbPoint.",".
    "'en stock','".
    "img/".$_POST['img'].".jpg', '".
    $_POST['Categorie']." ', '".
    $_POST['nom']."','".
    $_POST['Type']."',".
    $_POST['Volume'].")";
        echo $Query;
        if($r =$Connect->query($Query));
        {echo"cadeau ajouté";}


    }

    $Query ="Insert into produit (designation, stockProduit, prixAchat, Status, ImageProduit, CategorieProduit, NomProduit, TypeProduit, VolumeProduit) values ( '".
    $_POST['Designation']."',".
    $_POST['Stock'].",".
    $_POST['prixAchat'].",".
    "'en stock','".
    "img/".$_POST['img'].".jpg', '".
    $_POST['Categorie']." ', '".
    $_POST['nom']."','".
    $_POST['Type']."',".
    $_POST['Volume'].")";

    echo $Query;

   if($r =$Connect->query($Query));
   {echo"produit ajouté";}
    

}else{


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
    <a class="nav-link"  href="GestionCommande.php" ><i class="fas fa-cart-plus"style="margin-right: 9px;"></i>Gestion des commandes</a>
    <a class="nav-link"  href="Redirection.php" ><i class="fas fa-tasks"style="margin-right: 9px;"></i>Continuer entant que client</a>
    <a class="nav-link"  href="export.php"><i class="fas fa-download"style="margin-right: 9px;"></i>Exportation liste de commandes</a>
    <a class="nav-link" href="connexion.php"><i class="fas fa-sign-out-alt" style="margin-right: 9px;"></i>Déconnexion</a>
  </div>
  
</div> 
    <div class="form-container">
    <h1>Ajouter un produit</h1>
    <form class="formulaire form-floating mb-3" action="ajoutProduit.php" method="POST">
    <input type="text"   placeholder="Nom du Produit" name="nom" required>
    <input type="text"   placeholder="Designation" name="Designation" required>
    <input type = 'text' placeholde ="Stock" name="Stock" required> 
    <input type="text"   placeholder="prixAchat" name="prixAchat" required>
    <input type="text"   placeholder="NomImage" name="img" required>
    <input type="text"   placeholder="Catégorie" name="Categorie" required>
    <input type="text"   placeholder="Type de produit" name="Type" required>
    <input type="text"   placeholder="Volume du produit" name="Volume" required>
    <input type="checkbox" name ="estCadeau">
    <button class="btnClient submit" type="submit" name="ValiderAjout"  >Ajouter</button> 
    
</form>
</div>


<?php } ?>