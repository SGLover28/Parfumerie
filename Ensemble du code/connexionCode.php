


<?php
session_start();
  $db=mysqli_connect('localhost','root','');
  if(mysqli_connect_errno()) {
      die("MySQL connection failed: ". mysqli_connect_error());
     
  }
$selectdb=mysqli_select_db($db,"parfumerie");


if(isset($_POST['submit'])){
 if(!empty($_POST["identifiant"])&&!empty($_POST["motdepasse"])){
 $identifiant=$_POST["identifiant"]; 

 $motdepasse=$_POST["motdepasse"]; 
 $_SESSION['identifiantClient'] = $identifiant;
 $query= "SELECT * FROM client WHERE Email='$identifiant' AND MotDePasse='$motdepasse'";
 $result=mysqli_query($db,$query);
 if(mysqli_num_rows($result)== 1){
     $rowAdmin=mysqli_fetch_array( $result);
     if ($rowAdmin['isAdmin'] ==1)
     {
        echo '<script language="javascript">';
        echo 'alert(" vous êtes bien connecté en tant qu\'administrateur !")';
        echo '</script>';
        header('Location: dashboard.php');
     }
     
else
    {echo '<script language="javascript">';
      echo 'alert(" vous êtes bien connecté !")';
      echo '</script>';
      header('Location: index.php');
   } 
}
 else { 
   echo '<script language="javascript">';
   echo 'alert(" Mot de passe ou identifiant incorrect !")';
   echo '</script>';
   echo '  <a href="connexion.php"> <button  style="padding: 10px 35px 10px 35px;border: none;color: white;background-color: #5E113D;cursor: pointer;font-size: 30px;" >Retour au catalogue</button></a>';
  } 
 


 }
}
?>