<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Ticket";

ob_start();
// var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];

?>
<h2>Profile de <?= $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></h2>


<?php $contenu = ob_get_clean();


require "vues/gabarit.php"

?>