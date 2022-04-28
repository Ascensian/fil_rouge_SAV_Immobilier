<?php

spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Client";

ob_start();?>

<h1>Clients</h1>

<div id="listclient">
<?php 
$test = ClientMgr::getListClient();
var_dump($test);
?>
</div>


<?php $contenu = ob_get_clean(); 

require "../vues/gabarit.php";

?>
