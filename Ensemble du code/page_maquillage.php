<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");
$identifiant=$_SESSION['identifiantClient'] ;
$clientQuery="SELECT * FROM client where Email='$identifiant'";
$client=mysqli_query($db,$clientQuery);
$rowclient=mysqli_fetch_array($client);
$idClient=$rowclient['CodeClient'];
$fideliteQuery= "SELECT * from cartefidelite WHERE CodeClient=$idClient" ;
$fidelite=mysqli_query($db,$fideliteQuery);
$rowFidelite=mysqli_fetch_array($fidelite);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>page_maquillage</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
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
        <form class="d-flex" action="page_maquillage_search.php" method="POST">
          <input class="form-control " type="search" placeholder="Vous cherchez une marque ?" aria-label="Search"
            name="search">
          <button class="btn btn-search" type="submit" name="submit" value="submit" id="submitSearch"><i
              class="fas fa-search"></i></button>
        </form>
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
                  <a class="nav-link " href="page_parfum.php">Parfums</a>
      
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">Maquillages</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contactez-nous</a>
                </li>
      
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
      
      
          <div class="col-md-3">
            <div class="filtre">
      
      
      
              <form class="form_filtre" action="page_maquillage_filtre.php" method="POST">
                <h3 style="font-size:25px;margin-top:30px">Affinez vos recherches</h3>
      
                <h4 style="margin-top:50px">Prix:</h4>
                <hr color="white">
                <input type="number" min="10" max="10000" step="1" id="min" placeholder="min" name="min">
                <input type="number" min="10" max="10000" step="1" id="max" placeholder="max" name="max">
                <h4 style="margin-top:35px">Marque du produit</h4>
                <hr color="white">
                <ul>
                  <div class="form-check ">
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Chanel" id="check1" >
                      <label class="form-check-label labelSize" for="check1">
                        Chanel
                      </label>
                    </li>
                  
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="DIOR" id="check2" >
                      <label class="form-check-label labelSize" for="check2">
                        DIOR
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Lancome" id="check3">
                      <label class="form-check-label labelSize" for="check3">
                       Lancôme
                      </label>
      
                    </li>
      
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Rimmel London" id="check4" >
                      <label class="form-check-label labelSize" for="check4">
                      Rimmel London
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Maybelline New York" id="check5" >
                      <label class="form-check-label labelSize" for="check5">
                        Maybelline New York
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Sephora" id="check6" >
                      <label class="form-check-label labelSize" for="check6">
                        Sephora
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Yves Saint Laurent" id="check7" >
                      <label class="form-check-label labelSize" for="check7">
                        Yves Saint Laurent
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="MAC" id="check8" >
                      <label class="form-check-label labelSize" for="check8">
                        MAC
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Clinique" id="check9" >
                      <label class="form-check-label labelSize" for="check9">
                        Clinique
                      </label>
                    </li>
                    <li>
      
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Estée Lauder" id="check10" >
                      <label class="form-check-label labelSize" for="check10">
                        Estée Lauder
                      </label>
                    </li>
                    <li>
                      <input class="form-check-input" type="checkbox" name="marque[]"
                                value="Bourjois" id="check11" >
                      <label class="form-check-label labelSize" for="check11">
                      Bourjois
                      </label>
                    </li>
                  </div>
                </ul>
                <button class="btn" type="submit" name="submit2" value="submit" id="submit">Lancer la recherche</button>
              </form>
    
    
      </div>

    </div>
    <div class="col-md-5">
    <div id="carouselExampleDark" class="carousel slide slide_change carousel_parfum" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" data-bs-interval="6000">
             <img src="img/maquillage_1.png"  alt="carousel" width="100%">  
          </div>
    
          <div class="carousel-item" data-bs-interval="6000">
            <img src="img/maquillage_2.jpg" alt="carousel" width="100%">
          </div>
    
          <div class="carousel-item" data-bs-interval="6000">
            <img src="img/maquillage_2.png"  alt="carousel" width="100%">
          </div>
    
        </div>
        <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
      
    </div>
    <div class="col-sm-4">
      <div class="annonce">
        <h4> Achetez du maquillage en ligne au meilleur prix</h4>
        <p>Voulez-vous mettre en valeur votre beauté au meilleur prix ? A MyParfum, nous vous proposons des produits de maquillage parfaits pour les amateurs de maquillage et les accrocs de la beauté. Achetez votre maquillage en ligne et trouvez les produits des marques les plus reconnues dans le monde du maquillage et des cosmétiques. BB-crèmes, poudres compactes , bases de maquillage, rouges à lèvres et gloss, maquillage pour les yeux... de qualité professionnelle et à un prix incroyable.</p>
      </div>
    </div>
   
</div>
</div>
 
<div class="marque_nom">
  <hr style="height: 3px;">
  <ul style="margin-left: 400px;">
    
    <li >
      <img  src="img/clinique.png" alt="marque"  width="10%">
    </li>
    <li >
      <img  src="img/diorMaquillage.png" alt="marque" width="10%">
    </li>
    <li >
     <img  src="img/lancôme.png" alt="marque"  width="12%">
    </li>
    <li >
    <img  src="img/chanel.png" alt="marque"  width="10%">
    </li>
    <li>
      <img  src="img/MNY.png" alt="marque"  width="12%">
    </li>
   
  </ul>
  
  
  <hr style="height: 3px;">
 

</div>
<div class="contenu">
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-3" ></div>
    <div class="col-sm-9" >
      <div class="row-card-contenu"> 
      <?php 
                     $produitquery= "SELECT * FROM `produit` where CategorieProduit='Maquillage' ";
                      $produit=mysqli_query($db, $produitquery);
                    
                      while($rowproduit=mysqli_fetch_array($produit)){
                      
                       ?>
        <div class="column ">
          <div class="content">
          <img  src="<?php echo htmlspecialchars($rowproduit['ImageProduit']); ?>"
                        alt="<?php echo $rowproduit['NomProduit'] ?>" width="100%" />
            <h4 class="nom"><?php echo $rowproduit['NomProduit']?></h4>
            <p class="designation"> <?php echo $rowproduit['TypeProduit']?></p>
            <p class="status"><?php echo $rowproduit['Status']?></p>
            
            <P class="prix_contenu"><?php echo $rowproduit['PrixAchat']?> €</P>
             <?php echo '<a  href="produit.php?id='.$rowproduit['NumProduit'].'"> <button class="btn btn_produit">Voir le produit </button></a>'?>
             <div style='padding:15px;width:900px;height:700px' ></div>
          </div>
        </div>
     
      <!-- END GRID -->
      <?php } ?>
      </div>
      
    </div>
  </div>
</div>
 
 
</div>
  <div class="marque_nom">
    <hr style="height: 3px;">
    <ul >
  
      <li >
        <img  src="img/rimmel.png" alt="marque"  width="12%">
      </li>
      <li >
        <img  src="img/sephora.png" alt="marque" width="13%">
      </li>
      <li >
       <img  src="img/mac.png" alt="marque"  width="13%">
      </li>
      <li >
      <img  src="img/givenchy.png" alt="marque"  width="13%">
      </li>
      <li>
        <img  src="img/ysl.png" alt="marque"  width="14%">
      </li>
     
    </ul>
   
    <hr style="height: 3px;">
   
  
  </div>
  <footer id="contact">
    <div class="container-fluid">
  <div class="row">

   <div class="col-sm-4">
<div class="local">
<h1>NOTRE BOUTIQUE</h1>
<P>Adresse : 1 BD Charles</P>
<p> Le Mans, France 72000</p>
<p> Tél : 01 23 45 67 89</p>
<p> E-mail :  info@monsite.fr</p>
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
<img src="img/insta.png" alt="insta" width=3% >
<img src="img/twitter.png" alt="twitter" width=3% style="margin-left: 40px;">
<img src="img/fb.png" alt="fb" width=7% >
</div>
  </footer>

  <script type="text/javascript" src="js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>


</body>

</html>