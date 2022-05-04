<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();



$action = "recherche";

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}
if (isset($_GET["libTicket"])) {
    $ticket = rechercheMGR::rechercheLibTicket($_GET["libTicket"]);
var_dump($ticket);
}


switch ($action) {
    case "recherche":
        require("../vues/view_advancedResearch.php");
        break;
  case "libTicket":
    if (isset($_GET["libTicket"])) {
       
        var_dump($ticket);
        require("../vues/view_ticket.php");
    } 
    
    
}