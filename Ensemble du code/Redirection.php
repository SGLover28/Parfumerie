
<?php

if(isset($_POST['entantQue'])){

    session_start();
    $Connect = mysqli_Connect("127.0.0.1", "root", "", "parfumerie" );
    //On verifie que l'utilisateur existe 

    $QIdendifiant = "Select * from client where email = '".$_POST['entantQue']."'";
    $RIdentifiant = $Connect->query($QIdendifiant);
    echo $QIdendifiant;
    if($RIdentifiant = $Connect->query($QIdendifiant)){
    
    $_SESSION['identifiantClient'] = $_POST['entantQue'];

    header('Location: index.php');

    }else{
        echo"email non trouvée";
    }
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/58f1dd562a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Dashboard</title>
    <script type="text/javascript">
    var larg, haut;

    haut = (document.body.clientHeight);



    var d = document.getElementByClassName("changement");

    d.style.height = haut + "px";
    </script>
</head>

<form action ='' method = 'POST'>
    <input type ='text' class="form-control me-2" name='entantQue'>L'adresse mail de l'utilisateur que vous voulez incarner </input>
    <button class="btn" type='submit'> Prennez sa place</button>
</form>