<?php

$titre = "Commande";

ob_start();?>

<h1>Commandes</h1>


<?php $contenu = ob_get_clean(); 


require "../vues/gabarit.php"


?>