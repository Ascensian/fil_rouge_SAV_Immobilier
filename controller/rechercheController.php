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

if (isset($_POST["action"])) {
    if (isset($_POST["action"]) == "recherche") {
        $action = $_POST["action"];
}
    
}

if(isset($_POST["valeurRecherche"]) or isset($_GET['query'])) {
    $_GET["query"] = $_POST["valeurRecherche"];
    $tabClient = rechercheMGR::rechercheNomClient($_POST['valeurRecherche']);
    $tabCommande = rechercheMGR::rechercheNumCommande($_POST['valeurRecherche']);
    $tabTicket = rechercheMGR::rechercheLibTicket($_POST['valeurRecherche']);
}



switch ($action) {
    case "recherche":
        require("../vues/view_search.php");
        break;
    
}