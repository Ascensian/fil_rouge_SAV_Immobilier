<?php

$titre = "Tableau de Bord";



ob_start(); ?>

<h1>Tableau de bord</h1>


<?php $contenu = ob_get_clean();

require "gabarit.php"; ?>