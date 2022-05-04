<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
session_start();
// Fonctionne
// Connexion::getConnexion($_POST["identifiant"], $_POST["mdp"]);

// $compte = ConnexionMgr::controleconnexion($_POST["identifiant"], $_POST["mdp"]);
// $_SESSION["id"] = $compte[0]["idEmploye"];
// $_SESSION["nom"] = $compte[0]["NomEmploye"];
// $_SESSION["prenom"] = $compte[0]["PrenomEmploye"];
// $_SESSION["role"] = $compte[0]["RoleEmploye"];
// header('Location: dashboard.html');

try{
    $modif =  ClientMgr::modifClient($_GET['id'], $_GET['nom'], $_GET['prenom'],
     $_GET['inputAdress'], $_GET['inpuZip'], $_GET['inputCity'], $_GET['inputEmail14']);
     var_dump($modif);
     if(empty($modif)){
         echo "ok";
         throw new Exception("erreur modif");
     }
     die();
     $_GET['action'] = "client";
     }
     catch (Exception $e){
         echo $e->getMessage();
     }
