<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();

$action = "ticket";
$msgErreur = "";

switch ($action) {
    case "ticket":
        require("../vues/view_ticket.php");
        break;
}
