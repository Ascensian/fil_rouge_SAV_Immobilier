<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

$action = "ticket";
$msgErreur = "";
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $_SESSION["post"] = $action;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if (isset($_GET['id'])) {
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
        default:
            header("Location : sav/index.php");
    }
}
