<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();



$action = "connexion";
$msgErreur = "";

// créé le tableau associatif SESSION si le formulaire de connexion n'est pas vide avec les méthodes POST et GET
if ($action == "connexion" and !isset($_POST['action']) and !isset($_GET['action'])) {
    $_SESSION = array();
}

// si la clé "action" existe
if (isset($_POST['action'])) {
    // si la valeur de post est égale à dashboard
    if ($_POST['action'] == "dashboard") {
        try {
            // variable qui contient le tableau retourné avec le bon identifiant et login
            $compte = ConnexionMgr::controleconnexion($_POST["identifiant"], $_POST["mdp"]);
            $_SESSION["id"] = $compte[0]["idEmploye"];
            $_SESSION["nom"] = $compte[0]["NomEmploye"];
            $_SESSION["prenom"] = $compte[0]["PrenomEmploye"];
            $_SESSION["role"] = $compte[0]["RoleEmploye"];
            $action = $_POST['action'];
            
        } catch (ConnexionMgrException $e) {
            $msgErreur = $e->getMessage();
        }
    }
}

// Récupère la valeur de la méthode GET d'un formulaire pour l'assigner à la variable action
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

// Indiquer à la session si l'on est sur la page index ou non, "index" est utilisé dans les traitements liés au changement de page
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 1;
} else if ($_SESSION["index"] == 0) {
    $_SESSION["index"] = 1;
}


switch ($action) {
    case "connexion":
        require("vues/view_connexion.php");
        break;
    case "dashboard": // se lance quand on a le bon mot de passe afin d'achiver le dashboard
        require('vues/view_dashboard.php');
        break;
    case "commande":
        require("vues/view_commande.php");
        break;
    case "ticket":
        header("Refresh:0; url = controller/ticketController.php", false);
        break;
    case "client":
        require("vues/view_client.php");
        break;
    case "article":
        header("Refresh:0; url = controller/articleController.php", false);
        break;
    case "recherche":
        header("Refresh:0; url = controller/rechercheController.php", false);
        break;
    
}
