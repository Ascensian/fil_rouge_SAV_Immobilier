<?php

spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Details";

ob_start();?>


<h1>Détails</h1>

<?php
 $contenu = ob_get_clean(); 

require "../vues/gabarit.php";

?>