<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();

// var_dump($_SESSION);
$action = "connexion";
$msgErreur = "";

if (isset($_SESSION["msgErreur"]) and strlen($_SESSION["msgErreur"]) > 1) {
    $msgErreur = $_SESSION["msgErreur"];
    $_SESSION["msgErreur"] = "";
}
if (isset($_POST['action']) and isset($_SESSION)) {
    $action = $_POST['action'];
}
if (isset($_GET['action']) and isset($_SESSION["role"])) {
    $action = $_GET['action'];
}
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 1;
} else if ($_SESSION["index"] == 0) {
    $_SESSION["index"] = 1;
}

switch ($action) {
    case "connexion":
        if (isset($_SESSION["id"]) and isset($_SESSION["role"])) {
            session_unset();
        }
        var_dump($_SESSION);
        require("vues/view_connexion.php");
        break;
    case "dashboard": // se lance quand on a le bon mot de passe afin d'achiver le dashboard
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require('vues/view_dashboard.php');
        break;
    case "commande":
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require("vues/view_commande.php");
        break;
    case "ticket":
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        header("Refresh:0; url = controller/ticketController.php", false);
        break;
    case "client":
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require("vues/view_client.php");
        break;
    case "article":
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require("vues/view_article.php");
        break;
    case "recherche":
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require("vues/view_advancedResearch.php");
        break;
    case "deconnexion":
        if (isset($_SESSION["id"]) and isset($_SESSION["role"])) {
            session_unset();
            $_SESSION["deconnexion"] = 1;
        }
        header("Location:index.php");
        break;
    case "connexionval":
        try {
            if (isset($_POST["seconnecter"])) {
                $_SESSION["deconnexion"] = 0;
            }
            if (isset($_POST["identifiant"]) and isset($_POST["mdp"]) or $_SESSION["deconnexion"] == 1) {
                $compte = ConnexionMgr::controleconnexion($_POST["identifiant"], $_POST["mdp"]);

                $_SESSION["id"] = $compte[0]["idEmploye"];
                $_SESSION["nom"] = $compte[0]["NomEmploye"];
                $_SESSION["prenom"] = $compte[0]["PrenomEmploye"];
                $_SESSION["role"] = $compte[0]["RoleEmploye"];
                if ($_SESSION["role"] == "ADMIN") {
                    header("Location:index.php?action=profileUser");
                } else {
                    header("Location:index.php?action=dashboard");
                }
            }
            try {
                if (!isset($compte[0]["idEmploye"]) and !isset($compte[0]["RoleEmploye"])) {
                    throw new Exception("Erreur d'identifiant et de mot de passe");
                }
                if ($_SESSION["deconnexion"] != 0) {
                    throw new Exception("Erreur : Vous devez vous connecter pour accéder au site !");
                }
            } catch (Exception $e) {
                $_SESSION["msgErreur"] = $e->getMessage();
                $_POST["action"] = "connexion";
                header("Location:index.php");
            }
        } catch (ConnexionMgrException $e) {
            $_SESSION["msgErreur"] = $e->getMessage();
            $_POST["action"] = "connexion";
            header("Location:index.php");
        }
        var_dump($_SESSION);
        break;
    case "profileUser":
        $employe = employeMgr::getEmploye("root", "", $_SESSION["id"]);
        require("vues/view_profileUser.php");
        break;
}
