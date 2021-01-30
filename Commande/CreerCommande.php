
<?php


$ensembleAEcho = "<form action='ConfirmerCommande.php' method='POST'>
<div>
<input name='nom' type = 'text'> nom du client qui commande</input>
<input name='prenom' type = 'text'> prenom du client qui commande</input>
</div>";

$Connect = mysqli_Connect("127.0.0.1", "root", "", "tdparfumerie-2" );
if(!$Connect) 
{    echo "connexion impossible";}
else{   
    mysqli_select_db($Connect, "prjt_ty_internet_hennechart");
    for($i =0; $i<$_POST["qte"]; $i++){
        $name = "article".$i;
    
        $ensembleAEcho .= "<div><div><input name = ".$name." type='text'>article qu'il commande </input></div>"
        ."<div> <input name=".$name."qte type='number'/> </div></div> "
        ;
        
        
    }  
    echo $ensembleAEcho."<button type='submit'>envoie</button></form> ";


}
?>