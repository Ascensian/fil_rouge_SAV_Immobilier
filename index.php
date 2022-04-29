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
        require("../vues/view_connexion.php");
        break;
    case "dashboard": // se lance quand on a le bon mot de passe afin d'achiver le dashboard
        require("../fil_rouge_SAV_Immobilier/vues/view_dashboard.php");
        break;
    case "commande":
        header("Refresh:0; url = ../controler/controlercommande.php", false);
        break;
    case "ticket":
        require("../fil_rouge_SAV_Immobilier/vues/view_ticket.php");
        break;
    case "client":
        header("Refresh:0; url = ../controler/controlerclient.php", false);
        break;
    case "article":
        require("../fil_rouge_SAV_Immobilier/vues/view_article.php");
        break;
}
