<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();

// var_dump($_SESSION);
$action = "connexion";
$msgErreur = "";

// En cas d'erreur, on affiche un message pour l'indiquer
if (isset($_SESSION["msgErreur"]) and strlen($_SESSION["msgErreur"]) > 1) {
    $msgErreur = $_SESSION["msgErreur"];
    $_SESSION["msgErreur"] = "";
}
// On récupère l'action que contient la méthode post et on l'applique à notre action
if (isset($_POST['action']) and isset($_SESSION)) {
    $action = $_POST['action'];
}
// On récupère l'action que contient la méthode get et on l'applique à notre action
if (isset($_GET['action']) and isset($_SESSION["role"])) {
    $action = $_GET['action'];
}
// Permet de savoir si l'on est (ou non) dans l'index de l'application
if (!isset($_SESSION["index"])) {
    // Si l'index n'existe pas en session, on le crée 
    $_SESSION["index"] = 1;
} else if ($_SESSION["index"] == 0) {
    // Si l'index existe dans la session, on l'incrémante à 1
    $_SESSION["index"] = 1;
}

switch ($action) {
    case "connexion": // Action par défaut qui envoie les utilisateurs sur la page de connexion pour poursuivre l'utilisation de l'application
        if (isset($_SESSION["id"]) and isset($_SESSION["role"])) {
            session_unset();
        }
        require("vues/view_connexion.php");
        break;
    case "dashboard": // se lance quand on a le bon mot de passe afin d'achiver le dashboard
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require('vues/view_dashboard.php');
        break;
    case "commande": // Permet d'accéder à la liste des différentes commandes ayant un ticket
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        header("Refresh:0; url = ../controler/controlercommande.php", false);
        break;
    case "ticket": // Permet d'accéder au contrôleur liée aux tickets du SAV
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        header("Refresh:0; url = controller/ticketController.php", false);
        break;
    case "client": // Permet d'accéder à la liste des clients
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        header("Refresh:0; url = ../controler/controlerclient.php", false);
        break;
    case "article": // Permet d'accéder au catalogue des articles 
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require("vues/view_article.php");
        break;
    case "recherche": // Permet d'accéder à la partie de recherche en fonction de ses besoins 
        if ($_SESSION["role"] == "ADMIN") {
            header("Location:index.php?action=profileUser");
        }
        require("vues/view_advancedResearch.php");
        break;
    case "deconnexion": // Action permettant à l'utilisateur de mettre fin à sa session sur l'application
        if (isset($_SESSION["id"]) and isset($_SESSION["role"])) {
            session_unset();
            $_SESSION["deconnexion"] = 1;
        }
        header("Location:index.php");
        break;
    case "connexionval": // Action vérifiant les informations venant de la vue de connexion
        try {
            //permet d'empêcher le retour en arrière sur la session de l'utilisateur précédent mais aussi d'empêcher un utilisateur sans compte d'accéder aux pages
            if (isset($_POST["seconnecter"])) {
                $_SESSION["deconnexion"] = 0;
            }
            // Définit la session de l'utilisateur 
            if (isset($_POST["identifiant"]) and isset($_POST["mdp"]) or $_SESSION["deconnexion"] == 1) {
                $compte = ConnexionMgr::controleconnexion($_POST["identifiant"], $_POST["mdp"]);

                $_SESSION["id"] = $compte[0]["idEmploye"];
                $_SESSION["nom"] = $compte[0]["NomEmploye"];
                $_SESSION["prenom"] = $compte[0]["PrenomEmploye"];
                $_SESSION["role"] = $compte[0]["RoleEmploye"];
                // Permet de définir les définir le user et mot de passe pour accéder à la base de donnée en fonction de son role 
                $tParam = parse_ini_file("../param/roleuser.ini", true);
                if ($_SESSION["role"] == "SAV") {
                    extract($tParam["SAV"]);
                    $_SESSION["userRole"] = $userSAV;
                    $_SESSION["mdpRole"] = $mdpSAV;
                }
                if ($_SESSION["role"] == "HOT") {
                    extract($tParam["HOT"]);
                    $_SESSION["userRole"] = $userHOT;
                    $_SESSION["mdpRole"] = $mdpHOT;
                }
                if ($_SESSION["role"] == "ADMIN") {
                    extract($tParam["HOT"]);
                    $_SESSION["userRole"] = $userHOT;
                    $_SESSION["mdpRole"] = $mdpHOT;
                }
                // Si l'utilisateur est un administrateur, on l'envoie sur une page d'accueil personnalisée
                if ($_SESSION["role"] == "ADMIN") {
                    header("Location:index.php?action=profileUser");
                } else {
                    header("Location:index.php?action=dashboard");
                }
            }
            try {
                //Permet d'empêcher la connexion d'un utilisateur qui aurait laissé les champs de connexion vide
                if (!isset($compte[0]["idEmploye"]) and !isset($compte[0]["RoleEmploye"])) {
                    throw new Exception("Erreur d'identifiant et de mot de passe");
                }
                if ($_SESSION["deconnexion"] != 0) {
                    throw new Exception("Erreur : Vous devez vous connecter pour accéder au site !");
                }
            } catch (Exception $e) {
                $_SESSION["msgErreur"] = $e->getMessage();
                $_POST["action"] = "connexion";
                header("Location:index.php"); // On redirige l'utilisateur en cas d'erreur vers la page de connexion
            }
        } catch (ConnexionMgrException $e) { // Si l'utilisateur a rentrer un mauvais identifiant ou mot de passe ou les deux, on génère une exception pour l'empêcher d'accéder aux pages
            $_SESSION["msgErreur"] = $e->getMessage();
            $_POST["action"] = "connexion";
            header("Location:index.php");
        }
        break;
    case "profileUser": // Permet de voir ses données personnelles mais aussi de pouvoir changer son mot de passe
        $employe = employeMgr::getEmploye("root", "", $_SESSION["id"]);
        require("vues/view_profileUser.php");
        break;
}
