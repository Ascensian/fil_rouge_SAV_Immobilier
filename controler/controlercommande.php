<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

$action= "commande";

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $_SESSION["post"] = $action;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (isset($_GET['id']) AND (!isset($_POST['action']))) {
    $id = $_GET["id"];
    require("../vues/view_details.php");
}else{
switch($action){
    case "commande":
        require("../vues/view_commande.php");
        break;
    }
}
?>