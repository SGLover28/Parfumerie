

<?php

//on lance et on vide la variable session pour être réutilisée
session_start();


$_SESSION = array();

//deux possibilités: créer une commande oou la modifier (il y a l'option suppression dans la modification de commande)
?>

<form action="CreerCommande.php" method="POST">
    <input type="number" name="qte"> nombre de pruit à commander   </input>
    <input type = "number" name = "Cqte"> nombre de cadeau </input>
    <button type="submit" class="bouttonDefault">Ajouter une commande</button>
   
</form>
<form action="ModifierCommande.php" method="POST">
    <input name="IdCommande" class= "inputDefault"/>
    <button type="submit">Modifier cette commande</button>
</form>
<form action="Facture.php" method="POST">
    <input name="IdCommande" class= "inputDefault"/>
    <button type="submit">Afficher la facture</button>
</form>



