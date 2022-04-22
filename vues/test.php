<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
session_start();
// Fonctionne
// Connexion::getConnexion($_POST["identifiant"], $_POST["mdp"]);

$compte = ConnexionMgr::controleconnexion($_POST["identifiant"], $_POST["mdp"]);
$_SESSION["id"] = $compte[0]["idEmploye"];
$_SESSION["nom"] = $compte[0]["NomEmploye"];
$_SESSION["prenom"] = $compte[0]["PrenomEmploye"];
$_SESSION["role"] = $compte[0]["RoleEmploye"];
header('Location: dashboard.html');
