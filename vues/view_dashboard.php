<?php

$titre = "Tableau de Bord";



ob_start();
// var_dump($_SESSION); 
?>

<h1>Tableau de bord</h1>


<?php $contenu = ob_get_clean();

require "gabarit.php"; ?>