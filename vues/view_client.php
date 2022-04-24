<?php

$titre = "Client";

ob_start();?>

<h1>Clients</h1>


<?php $contenu = ob_get_clean(); 

require "../vues/gabarit.php"

?>