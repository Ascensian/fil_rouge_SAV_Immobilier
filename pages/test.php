<?php
require("../classes/connexion.class.php");
session_start();

Connexion::getConnexion($_POST["identifiant"], $_POST["mdp"]);
echo "ok";
