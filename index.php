<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();



$action = "connexion";
$msgErreur = "";
if ($action == "connexion" and !isset($_POST['action']) and !isset($_GET['action'])) {
    $_SESSION = array();
}
if (isset($_POST['action'])) {
    if ($_POST['action'] == "dashboard") {
        try {
            $compte = ConnexionMgr::controleconnexion($_POST["identifiant"], $_POST["mdp"]);
            $_SESSION["id"] = $compte[0]["idEmploye"];
            $_SESSION["nom"] = $compte[0]["NomEmploye"];
            $_SESSION["prenom"] = $compte[0]["PrenomEmploye"];
            $_SESSION["role"] = $compte[0]["RoleEmploye"];
            $action = $_POST['action'];
            var_dump($_SESSION);
        } catch (ConnexionMgrException $e) {
            $msgErreur = $e->getMessage();
        }
    }
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
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
        require("vues/view_article.php");
        break;
}
