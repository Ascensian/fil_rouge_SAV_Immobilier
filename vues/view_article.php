<?php

$titre = "Article";

ob_start();?>

<h1>Articles</h1>


<?php $contenu = ob_get_clean(); 

require "../fil_rouge_SAV_Immobilier/vues/gabarit.php"

?>