<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});


session_start();
// var_dump($_SESSION);
$action = "ticket";
$msgErreur = "";
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
if (isset($_GET['id']) and !isset($_POST['action'])) {
    $id = $_GET["id"];
    require("../vues/view_ticketDetail.php");
} else {
    switch ($action) {
        case "ticket":
            require("../vues/view_ticket.php");
            break;
        case "article":
            require("../vues/view_ticket.php");
            break;
        case "date":
            require("../vues/view_ticket.php");
            break;
        case "code":
            require("../vues/view_ticket.php");
            break;
    }
}
