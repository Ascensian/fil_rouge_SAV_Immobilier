<?php 


$titre = "recherche par client";
ob_start();
?>

<h1>coucou</h1>


<?php
$contenu = ob_get_clean();
require "./vues/view_advancedResearch.php";


?>

<h1>coucou</h1>