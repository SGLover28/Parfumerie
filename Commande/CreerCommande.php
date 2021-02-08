
<?php

//on cree une seule string pour l'echo à la fin du script

//on determine avec le form les informations nécessaires pour la commandes (le produit le cadeau, la qté demandée etc) 
$ensembleAEcho = "<form action='ConfirmerCommande.php' method='POST'>
<div>
<input name='nom' type = 'text'> nom du client qui commande</input>
<input name='prenom' type = 'text'> prenom du client qui commande</input>
</div>";

   
   
    
    for($i =0; $i<$_POST["qte"]; $i++){
        $name = "article".$i;
    
        $ensembleAEcho .= "<div><div><input name = ".$name." type='text'>article qu'il commande </input></div>"
        ."<div> <input name=".$name."qte type='number'/> </div></div> "
        ;
        
        
    }  

    for($j=$i; $j<$_POST["Cqte"]+$i; $j++){
        $name = "Cadeau".$j;
    
        $ensembleAEcho .= "<div><div><input name = ".$name." type='text'>cadeau qu'il commande </input></div>"
        ."<div> <input name=".$name."qte type='number'/> </div></div> "
        ;
    }
    echo $ensembleAEcho."<button type='submit'>envoie</button></form> ";



?>