<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

$action = "ticket";
$msgErreur = "";
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

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
