<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();

$action = "connexion";
$msgErreur = "";
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


switch ($action) {
    case "connexion":
        require("vues/view_connexion.php");
        break;
    case "dashboard": // se lance quand on a le bon mot de passe afin d'achiver le dashboard
        require('vues/view_dashboard.php');
        break;
    case "commande":
        require("../vues/view_commande.php");
    case "ticket":
        require("..vues/view_ticket.php");
    case "client":
        require("..vues/view_client.php");
    case "article":
        require("..vues/view_article.php");
    case "advancedResearch":
        require("..vues/view_advancedResearch.php");
    case "articleRecherche" :
        require("./vues/recherche/articleRecherche.php");
    case "clientRecherche" :
        require("./vues/recherche/clientRecherche.php");
    case "commandeRecherche" :
        require("./vues/recherche/commandeRecherche.php");
    case "garantieRecherche" :
        require("./vues/recherche/garantieRecherche.php");
    case "ticketRecherche" :
        require("./vues/recherche/ticketRecherche.php");
}
