

<?php

session_start();
if(isset($_SESSION["query"])){
    $_SESSION["query"] =NULL;
}


?>

<form action="CreerCommande.php" method="POST">
    <input type="number" name="qte"> nombre d'item à commander   </input>
    <button type="submit" class="bouttonDefault">Ajouter une commande</button>
   
</form>
<form action="ModifierCommande.php">
    <input name="IdCommande" class= "inputDefault"/>
    <button type="submit">Modifier cette commande</button>
</form>

