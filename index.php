<?php
spl_autoload_register(function ($classe) {
    require "classes/" . $classe . ".class.php";
});

session_start();

$action = "connexion";
$msgErreur = "";
if (isset($_POST['action'])) {
    if ($_POST['action'] == "connexionMAJ") {
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
    case "connexionMAJ": // se lance quand on a le bon mot de passe afin d'achiver le dashboard
        header('Location: vues/dashboard.html');
        break;
}
