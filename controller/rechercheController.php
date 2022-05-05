<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();



$action = "query";

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}

if (isset($_POST["action"]) == "query") {
    $action = $_POST["action"];
}


switch ($action) {
    case "query":
        echo "couc";
        var_dump(rechercheMGR::rechercheNomClient("Adn"));
        require("../vues/view_search.php");
        break;
    
}