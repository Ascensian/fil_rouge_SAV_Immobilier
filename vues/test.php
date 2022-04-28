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

// $ticket = ticketMgr::getAll("test", "test");
// print_r($ticket);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/test.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="ticketbtn">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="Rechercher">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="Rechercher">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="Rechercher">
        </form>
    </div>
</body>

</html>