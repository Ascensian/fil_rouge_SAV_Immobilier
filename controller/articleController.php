<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

$action = "article";

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}

// if ($_POST['action'] == "article") {

// }
switch ($action) {
    case "article" :
        require('../vues/view_article.php');
        require("../vues/view_ticket.php");
        break;
}
?>
