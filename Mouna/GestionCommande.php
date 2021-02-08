
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

<body style="background-color: rgb(245, 232, 212);">
    <nav class="navbar navbar-expand-lg navbar-light  ">
        <div class="container-fluid">
            <h1 class="navbar-brand">Dashboard</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" action="recherche.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Nom et Prénom" aria-label="Search"
                        name="search">
                    <button class="btn" type="submit" name="submit" value="submit" id="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="d-flex align-items-start changement">

        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <img class="logo" src="img/logo.png" alt="logo" width="270 px">
            <div class="trait"> </div>
            <a class="nav-link active"><i class="fas fa-clipboard-list" style="margin-right: 9px;"></i>Liste des
                clients</a>
            <a class="nav-link" href="ajoutClient.php"><i class="fas fa-address-book"
                    style="margin-right: 9px;"></i>Ajout des clients</a>
            <a class="nav-link" href="GestionCommande.php"><i class="fas fa-cart-plus" style="margin-right: 9px;"></i>Gestion des
                commandes</a>
            <a class="nav-link" href=""><i class="fas fa-tasks" style="margin-right: 9px;"></i>Génération de
                factures</a>
            <a class="nav-link" href=""><i class="fas fa-download" style="margin-right: 9px;"></i>Exportation liste de
                commandes</a>
                <a class="nav-link" href="connexion.php"><i class="fas fa-sign-out-alt" style="margin-right: 9px;"></i>Déconnexion</a>
        </div>

    </div>
<?php

//on lance et on vide la variable session pour être réutilisée
session_start();


$_SESSION = array();

//deux possibilités: créer une commande oou la modifier (il y a l'option suppression dans la modification de commande)
?>
<div id="espaceGestion" style="position:absolute; right:0; top: 25%; height : 10% ;width :75% ">
<H1>Ajouter une nouvelle commande</H1>
<form action="CreerCommande.php" method="POST">
    <input class="form-control me-2" type="number" name="qte"> nombre de pruit à commander   </input>
    <input class="form-control me-2" type = "number" name = "Cqte"> nombre de cadeau </input></p>
    <button class="btn" type="submit" class="bouttonDefault">Ajouter une commande</button>
   
</form>

<H1>Modifier une commande</H1>
<form action="ModifierCommande.php" method="POST">
    <input placeholder ='le numéro de commande' name="IdCommande" class="form-control me-2"/>
    <button class="btn" type="submit">Modifier cette commande</button>
</form>
<H1>Affichez une facture </H1>
<form action="Facture.php" method="POST">
    <input  placeholder ='le numéro de commande' type='number' name="IdCommande" class="form-control me-2"/>
    <button class="btn" type="submit">Afficher la facture</button>
</form>

<form action ='export.php'>

<button class="btn" type='submit'> Exporter l'ensemble des commandes</button>
</form>
</div>



