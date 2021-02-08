<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");
if(isset($_SESSION['identifiantClient'])){
$identifiant=$_SESSION['identifiantClient'] ;
$clientQuery="SELECT * FROM client where Email='$identifiant'";
$client=mysqli_query($db,$clientQuery);
$rowclient=mysqli_fetch_array($client);
$idClient=$rowclient['CodeClient'];
$fideliteQuery= "SELECT * from cartefidelite WHERE CodeClient=$idClient" ;
$fidelite=mysqli_query($db,$fideliteQuery);
$rowFidelite=mysqli_fetch_array($fidelite);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script src="https://kit.fontawesome.com/58f1dd562a.js" crossorigin="anonymous"></script>

</head>

<body>

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
        <!-- <form class="d-flex"  action="recherche.php" method="POST">
              <input class="form-control me-2" type="search" placeholder="Nom et Prénom" aria-label="Search" name="search" >
              <button class="btn" type="submit"name="submit" value="submit" id="submit">Rechercher</button>
            </form> -->
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-light nav2 ">
    <div class="container-fluid">


      <div class="collapse navbar-collapse" id="navbarNav">
        <div id="myHeader" style="background-color: white;">

          <ul class="navbar-nav linav2">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#nouveaute">Nouveautés</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#selection">Sélections</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#cadeau">Cadeaux</a>
           
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#parfum">Parfums</a>
            
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#cosmethique">Maquillages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contactez-nous</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div id="carouselExampleDark" class="carousel carousel-fade slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active" data-bs-interval="6000">
     
        <div style="background-image: url('img/carousel1.jpg');" class="parallax"></div>
      </div>
      <div class="carousel-item" data-bs-interval="6000">
    
        <div style="background-image: url('img/carousel2.jpg');" class="parallax"></div>

      </div>

      <div class="carousel-item" data-bs-interval="6000">
      
        <div style="background-image: url('img/carousel4.jpg');" class="parallax"></div>
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


  <div class="nouveaute" id="nouveaute">
   
     <div style="margin-top: 60px;" >
      
      <div class="trait_nouveaute" style="height: 5px;  background-color:#282e34;position:relative;top: 50px;"></div>
      <div style="background-color: rgb(255, 255, 255); height: 30px; width: 250px;position:relative; top: 40px; margin-left: 600px;" ></div>
      <h2 style="margin-bottom: 30px;position:relative;margin-left: 614px;" >Nos Nouveautés</h2>
      <hr>
      <div class="trait_nouveaute" style="height: 5px; width: 240px; background-color:#282e34;position:relative;left: 607px;top: -22px;"></div>
    </div>
  
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="row">
          <?php $produitquery= "SELECT * FROM `produit`  order by NumProduit desc limit 4";
           $produit=mysqli_query($db, $produitquery);
           echo mysqli_error($db);
           while ($rowproduit=mysqli_fetch_array( $produit)) { 
       
            ?>
         

          <div class="col-md-3 d-none d-md-block">
            <div class="card mb-2">
            <?php echo '<img class="card-img-top" src= "'.$rowproduit['ImageProduit'].'" alt="Card image cap">'?>
              <div class="card-body">
                <h4 class="card-title"> <?php echo $rowproduit['NomProduit']?></h4>
                <p class="card-text"> <?php echo  $rowproduit['TypeProduit']?> </p>
                <p class="card-text"><?php echo $rowproduit['CategorieProduit']?></p>
                  <h4 class="card-price"><?php echo $rowproduit['PrixAchat']?> €</h4>
               
                <?php echo '<a class="btn" href="produit.php?id='.$rowproduit['NumProduit'].'">Voir le produit</a></td>'?>
              </div>
            </div>
          </div>
           <?php } ?>
         

        </div>
      </div>
    </div>

  </div>
  <div class="selection" id="selection">

    <div style="margin-top: 60px;" >
      
      <div class="trait_nouveaute" style="height: 5px;  background-color:#282e34;position:relative;top: 50px;"></div>
      <div style="background-color: rgb(255, 255, 255); height: 30px; width: 250px;position:relative; top: 40px; margin-left: 600px;" ></div>
      <h2 style="margin-bottom: 30px;position:relative;margin-left: 614px;" >Nos sélections</h2>
      <hr>
      <div class="trait_nouveaute" style="height: 5px; width: 240px; background-color:#282e34;position:relative;left: 607px;top: -22px;"></div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          
          <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->

            <ol class="carousel-indicators">
              <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
              <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
            </ol>
            <?php $produitcarouselquery= "SELECT * FROM `produit` where selection=1";
           
           $produitcarousel=mysqli_query($db, $produitcarouselquery);
           echo mysqli_error($db);
           $num = 0;
       
            ?>
          

            <!-- Wrapper for carousel items -->
            <div class="carousel-inner" role="listbox">
              <?php while ($rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ) {  ?>
              <div class="carousel-item <?php if($num==1){ echo ' active'; } ?>" data-bs-interval="100000">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                           
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat']) ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                 <?php   $rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ?>
                 <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat']) ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat'])  ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat']); ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              <?php $num=$num+1;} ?>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
     
    </div>

    <!-- END MAIN -->
  </div>

 
  <div class="cadeau" id="cadeau">
    <div style="margin-top: 60px;" >
      <div class="trait_nouveaute" style="height: 5px;  background-color:#282e34;position:relative;top: 50px;"></div>
      <div style="background-color: rgb(255, 255, 255); height: 30px; width: 490px;position:relative; top: 40px; margin-left: 531px;" ></div>
      <h2 style="margin-bottom: 30px;position:relative;margin-left: 547px;" >Nos cadeaux spéciaux pour vous </h2>
      <hr>
      <div class="trait_nouveaute" style="height: 5px; width: 500px; background-color:#282e34;position:relative;left: 528px;top: -22px;"></div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         
          <div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
              <li data-bs-target="#myCarousel2" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#myCarousel2" data-bs-slide-to="1"></li>
              <li data-bs-target="#myCarousel2" data-bs-slide-to="2"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <?php $cadeaucarouselquery= "SELECT * FROM `cadeau` limit 16";
           
           $cadeaucarousel=mysqli_query($db, $cadeaucarouselquery);
           
           $num = 0;
       
            ?>
          

            <!-- Wrapper for carousel items -->
            <div class="carousel-inner" role="listbox">
              <?php while ($rowcadeaucarousel=mysqli_fetch_array( $cadeaucarousel) ) {  ?>
              <div class="carousel-item <?php if($num==1){ echo ' active'; } ?>" data-bs-interval="100000">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowcadeaucarousel['ImageCadeau']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="cadeau.php?id='.$rowcadeaucarousel['NumCadeau'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowcadeaucarousel['NomCadeau']); ?></a>
                            <span><?php echo ($rowcadeaucarousel['CategorieCadeau']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowcadeaucarousel['nbPointCadeau']) ?> <i class="fas fa-star"></i></a>

                        </div>

                      </div>
                    </div>
                  </div>
                 <?php   $rowcadeaucarousel=mysqli_fetch_array($cadeaucarousel) ?>
                 <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowcadeaucarousel['ImageCadeau']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="cadeau.php?id='.$rowcadeaucarousel['NumCadeau'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowcadeaucarousel['NomCadeau']); ?></a>
                            <span><?php echo ($rowcadeaucarousel['CategorieCadeau']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowcadeaucarousel['nbPointCadeau']) ?> <i class="fas fa-star"></i></a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowcadeaucarousel=mysqli_fetch_array($cadeaucarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowcadeaucarousel['ImageCadeau']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="cadeau.php?id='.$rowcadeaucarousel['NumCadeau'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowcadeaucarousel['NomCadeau']); ?></a>
                            <span><?php echo ($rowcadeaucarousel['CategorieCadeau']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowcadeaucarousel['nbPointCadeau']) ?> <i class="fas fa-star"></i></a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowcadeaucarousel=mysqli_fetch_array($cadeaucarousel)  ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowcadeaucarousel['ImageCadeau']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="cadeau.php?id='.$rowcadeaucarousel['NumCadeau'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowcadeaucarousel['NomCadeau']); ?></a>
                            <span><?php echo ($rowcadeaucarousel['CategorieCadeau']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowcadeaucarousel['nbPointCadeau']) ?> <i class="fas fa-star"></i></a>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              <?php $num=$num+1;} ?>
            </div>
         
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel2" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel2" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
      <a class="voirPlus" href="page_cadeau.php">Voir plus</a>
    </div>
    
  </div>
  <div class="Parfum" id="parfum">
    <div style="margin-top: 60px;" >
      
      <div class="trait_nouveaute" style="height: 5px;  background-color:#282e34;position:relative;top: 50px;"></div>
      <div style="background-color: rgb(255, 255, 255); height: 30px; width: 250px;position:relative; top: 40px; margin-left: 600px;" ></div>
      <h2 style="margin-bottom: 30px;position:relative;margin-left: 638px;" >Nos parfums</h2>
      <hr>
      <div class="trait_nouveaute" style="height: 5px; width: 240px; background-color:#282e34;position:relative;left: 607px;top: -22px;"></div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         
          <div id="myCarousel3" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
              <li data-bs-target="#myCarousel2" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#myCarousel2" data-bs-slide-to="1"></li>
              <li data-bs-target="#myCarousel2" data-bs-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for carousel items -->
            <?php $parfumcarouselquery= "SELECT * FROM `produit` where CategorieProduit='Parfum' limit 16";
           
           $parfumcarousel=mysqli_query($db, $parfumcarouselquery);
           echo mysqli_error($db);
           $num = 0;
       
            ?>
          
 <!-- Wrapper for carousel items -->
 <div class="carousel-inner" role="listbox">
              <?php while ($rowparfumcarousel=mysqli_fetch_array( $parfumcarousel) ) {  ?>
              <div class="carousel-item <?php if($num==1){ echo ' active'; } ?>" data-bs-interval="100000">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowparfumcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowparfumcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowparfumcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowparfumcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowparfumcarousel['PrixAchat']) ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                 <?php   $rowparfumcarousel=mysqli_fetch_array( $parfumcarousel) ?>
                 <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowparfumcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowparfumcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowparfumcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowparfumcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowparfumcarousel['PrixAchat']) ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowparfumcarousel=mysqli_fetch_array( $parfumcarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowparfumcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowparfumcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowparfumcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowparfumcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowparfumcarousel['PrixAchat'])  ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowparfumcarousel=mysqli_fetch_array( $parfumcarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowparfumcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowparfumcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowparfumcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowparfumcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowparfumcarousel['PrixAchat']); ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              <?php $num=$num+1;} ?>
            </div>
          
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel3" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel3" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
      <a class="voirPlus" href="page_parfum.php">Voir plus</a>
    </div>
  </div>
  <div class="Cosmethique" id="cosmethique">
    <div style="margin-top: 60px;" >
      
      <div class="trait_nouveaute" style="height: 5px;  background-color:#282e34;position:relative;top: 50px;"></div>
      <div style="background-color: rgb(255, 255, 255); height: 30px; width: 250px;position:relative; top: 40px; margin-left: 600px;" ></div>
      <h2 style="margin-bottom: 30px;position:relative;margin-left: 614px;" >Nos Maquillages</h2>
      <hr>
      <div class="trait_nouveaute" style="height: 5px; width: 240px; background-color:#282e34;position:relative;left: 607px;top: -22px;"></div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
         
          <div id="myCarousel4" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
              <li data-bs-target="#myCarousel2" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#myCarousel2" data-bs-slide-to="1"></li>
              <li data-bs-target="#myCarousel2" data-bs-slide-to="2"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <?php $produitcarouselquery= "SELECT * FROM `produit` where CategorieProduit='Maquillage'";
           
           $produitcarousel=mysqli_query($db, $produitcarouselquery);
           echo mysqli_error($db);
           $num = 0;
       
            ?>
          

            <!-- Wrapper for carousel items -->
            <div class="carousel-inner" role="listbox">
              <?php while ($rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ) {  ?>
              <div class="carousel-item <?php if($num==1){ echo ' active'; } ?>" data-bs-interval="100000">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat']) ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                 <?php   $rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ?>
                 <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat']) ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat'])  ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                  <?php   $rowproduitcarousel=mysqli_fetch_array( $produitcarousel) ?>
                  <div class="col-sm-3">
                    <div class="thumb-wrapper">
                      <div class="box">
                        <!--img-box---------->
                        <div class="slide-img">
                        <img  src="<?php echo htmlspecialchars($rowproduitcarousel['ImageProduit']); ?>" alt="<?php echo $num; ?>" />
         
                          <!--overlayer---------->
                          <div class="overlay">
                            <!--buy-btn------>
                            <?php echo '<a class="buy-btn" href="produit.php?id='.$rowproduitcarousel['NumProduit'].'">Voir le produit</a>'?>
                          </div>
                        </div>
                        <!--detail-box--------->
                        <div class="detail-box">
                          <!--type-------->
                          <div class="type">
                            <a href="#"><?php echo ($rowproduitcarousel['NomProduit']); ?></a>
                            <span><?php echo ($rowproduitcarousel['CategorieProduit']); ?></span>
                          </div>
                          <!--price-------->
                          <a href="#" class="price"><?php echo ($rowproduitcarousel['PrixAchat']); ?> €</a>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              <?php $num=$num+1;} ?>
            </div>
         
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#myCarousel4" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel4" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
      <a class="voirPlus" href="page_maquillage.php">Voir plus</a>
    </div>
  </div>
  <div class="info">
     
<img src="img/Perfum4.png" alt="" srcset="" width="100%">
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