<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");
$clientsquery= "SELECT * FROM `client`";
 $clients=mysqli_query($db,$clientsquery);

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
      <form class="d-flex"  action="recherche.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Nom et Prénom" aria-label="Search" name="search" >
        <button class="btn" type="submit"name="submit" value="submit" id="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>

 <div class="d-flex align-items-start changement">

  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     <img class="logo" src="logo.png" alt="logo" width="270 px" >
     <div class="trait"> </div>
    <a class="nav-link active"  ><i class="fas fa-clipboard-list"  style="margin-right: 9px;"></i>Liste des clients</a>
    <a class="nav-link"  href="ajoutClient.php"><i class="fas fa-address-book"style="margin-right: 9px;"></i>Ajout des clients</a>
    <a class="nav-link"  href="" ><i class="fas fa-cart-plus"style="margin-right: 9px;"></i>Gestion des commandes</a>
    <a class="nav-link"  href="" ><i class="fas fa-tasks"style="margin-right: 9px;"></i>Génération de factures</a>
    <a class="nav-link"  href=""><i class="fas fa-download"style="margin-right: 9px;"></i>Exportation liste de commandes</a>
  </div>
  
</div> 
<?php  
if(isset($_POST['submit'])){
  @$searchRec=$_POST['search'];
  @$search = mysqli_real_escape_string($db,$searchRec);
    if (empty($search)) 
   {
          ?>
    <h2 class="title-1 m-b-25">Liste des clients</h2>
    <div class="table-responsive table--no-card m-b-40" style="width: 1200px; margin-left:300px">
        <table class="table table-borderless table-striped table-earning">
           
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th class="text-right">Nombre de points</th>
                    <th class="text-right">Membership</th>
                    <th class="text-right">Visualier</th>
                    <th class="text-right">Modifier</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while ($row=mysqli_fetch_array($clients)) { 
                       
                      $codeClient=$row["CodeClient"];
                     
                        $fideliteClientQuery = "SELECT * FROM cartefidelite where CodeClient= $codeClient";
                    
                        $fideliteClient=mysqli_query($db, $fideliteClientQuery);
                        if (!empty( $fideliteClient)) {
                           
                       
                        $rowFidelite=mysqli_fetch_array( $fideliteClient);
                        $nbFidelite= $rowFidelite['NbPoints'];
                        $membershipQuery="SELECT * FROM cartefidelitemembership where $nbFidelite BETWEEN NbPointsNiveauMin AND NbPointsNiveauMax";
                        $membership=mysqli_query($db, $membershipQuery);
                        
                        if (!empty($membership)) { 
                        $rowMembership=mysqli_fetch_array($membership);
                        }
                       ?>
                      
                        <td><?php echo $row["CodeClient"] ?></td>
                        <td><?php echo  $row["NomClient"] ?></td>
                        <td><?php echo  $row["PrenomClient"] ?></td>
                        <?php if (!empty($membership)) {    ?>
                        <td class="text-right"><?php echo   $rowFidelite['NbPoints'] ?></td>
                        <td class="text-right"><?php echo   $rowMembership['NomMembership'] ?></td>
                        <?php } else{?>
                          <td class="text-right"></td>
                        <td class="text-right"></td>
                        <?php } ?>
                        <?php echo '<td class="text-right"><a class="btn" href="visualiser.php?id='.$row['CodeClient'].'">Visualiser</a></td>'?>
                        <?php echo '<td class="text-right"><a class="btn" href="modifier.php?id='.$row['CodeClient'].'">Modifier</a></td>'?>
                      
                      
                </tr>
                

            
        <?php }} ?>
        </tbody>
       
        </table>
    </div>
    <?php } else {
      
      @$sqlSearch= " SELECT * FROM `client` WHERE CONCAT(`NomClient`,' ',`PrenomClient`)='$search' ORDER BY CodeClient " ;
        @$result=mysqli_query($db,$sqlSearch);
  
   
            ?> 
      <h2 class="title-1 m-b-25"> Liste des clients</h2>
    <div class="table-responsive table--no-card m-b-40" style="width: 1200px; margin-left:300px">
        <table class="table table-borderless table-striped table-earning">
           
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th class="text-right">Nombre de points</th>
                    <th class="text-right">Membership</th>
                    <th class="text-right">Visualier</th>
                    <th class="text-right">Modifier</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while ($rowChoix=mysqli_fetch_array($result)) { 
                       
                      $codeClient=$rowChoix["CodeClient"];
                     
                        $fideliteClientQuery = "SELECT * FROM cartefidelite where CodeClient= $codeClient";
                    
                        $fideliteClient=mysqli_query($db, $fideliteClientQuery);
                        if (!empty( $fideliteClient)) {
                           
                       
                        $rowFidelite=mysqli_fetch_array( $fideliteClient);
                        $nbFidelite= $rowFidelite['NbPoints'];
                        $membershipQuery="SELECT * FROM cartefidelitemembership where $nbFidelite BETWEEN NbPointsNiveauMin AND NbPointsNiveauMax";
                        $membership=mysqli_query($db, $membershipQuery);
                        
                        if (!empty($membership)) { 
                        $rowMembership=mysqli_fetch_array($membership);
                        }
                       ?>
                      
                        <td><?php echo $rowChoix["CodeClient"] ?></td>
                        <td><?php echo  $rowChoix["NomClient"] ?></td>
                        <td><?php echo  $rowChoix["PrenomClient"] ?></td>
                        <?php if (!empty($membership)) {    ?>
                        <td class="text-right"><?php echo   $rowFidelite['NbPoints'] ?></td>
                        <td class="text-right"><?php echo   $rowMembership['NomMembership'] ?></td>
                        <?php } else{?>
                          <td class="text-right"></td>
                        <td class="text-right"></td>
                        <?php } ?>
                        <?php echo '<td class="text-right"><a class="btn" href="visualiser.php?id='.$rowChoix['CodeClient'].'">Visualiser</a></td>'?>
                        <?php echo '<td class="text-right"><a class="btn" href="modifier.php?id='.$rowChoix['CodeClient'].'">Modifier</a></td>'?>
                      
                      
                </tr>
                

            
        <?php }} ?>
        </tbody>
       
        </table>
    </div>
    <?php }} ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>


