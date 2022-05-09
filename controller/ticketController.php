<?php
/*spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});*/
require("../classes/ticketMgr.class.php");


session_start();

//var_dump($_SESSION);

//Permet de bloquer l'affichage du contrôleur et de renvoyer vers la page de connexion
if ($_SESSION['role'] == "ADMIN" or !isset($_SESSION['role']) or $_SESSION["deconnexion"] == 1) {
    $_SESSION["msgErreur"] = "Désolé, ce n'est pas la page que vous cherchez";
    header("Refresh:0; url = ../index.php?action=connexion", false);
}

// Action par défault du contrôleur 
$action = "ticket";
// Message d'erreur initialiser au début du contrôleur
$msgErreur = "";
// Permet de savoir si l'on est (ou non) dans l'index de l'application
if (!isset($_SESSION["index"])) {
    // Si l'index n'existe pas en session, on le crée 
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    // Si l'index existe dans la session, on l'incrémante à 1
    $_SESSION["index"] = 0;
}

// On récupère l'action que contient la méthode post et on l'applique à notre action
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $_SESSION["post"] = $action;
}
// On récupère l'action que contient la méthode get et on l'applique à notre action
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $_SESSION["get"] = $action;
}
// En cas d'erreur, on affiche un message d'erreur à l'utilisateur
if (isset($_SESSION["msgErreurFormHisto"])) {
    $msgErreur = $_SESSION["msgErreurFormHisto"];
    unset($_SESSION["msgErreurFormHisto"]);
}

// Permet d'appeler la table pour la requete pour le tri des tickets
$table = "";
if ($action == "article") {
    $table = "IdArticle";
} else if ($action == "date") {
    $table = "DateTicketSAV";
} else if ($action == "code") {
    $table = "CommentaireTicketSAV";
}
if ($table != "") {
    $ticket = ticketMgr::getTicketsOrderBy($_SESSION["userRole"],  $_SESSION["mdpRole"], $table);
} else {
    $ticket = ticketMgr::getAllTickets($_SESSION["userRole"],  $_SESSION["mdpRole"]);
}

switch ($action) {
    case "ticket": // Action par défaut qui envoie les utilisateurs sur la page tout les tickets
        $_SESSION["posttri"] = "ticket";
        require("../vues/view_ticket.php");
        break;
    case "article":
        $_SESSION["posttri"] = "article";
        require("../vues/view_ticket.php");
        break;
    case "date":
        $_SESSION["posttri"] = "date";
        require("../vues/view_ticket.php");
        break;
    case "code":
        $_SESSION["posttri"] = "code-";
        require("../vues/view_ticket.php");
        break;
    case "formulairehistorique":
        $histo = ticketMgr::getHistoriqueById($_SESSION["userRole"], $_SESSION["mdpRole"], $_SESSION["getId"]);
        require("../vues/formulairehistorique.php");
        break;
    case "detailsTicket":
        if (isset($_GET['id'])) {
            $_SESSION["getId"] = $_GET["id"];
        }
        $ticketfini = ticketMgr::getTicketFini($_SESSION["userRole"], $_SESSION["mdpRole"], $_SESSION["getId"]);
        $histo = ticketMgr::getHistoriqueById($_SESSION["userRole"], $_SESSION["mdpRole"], $_SESSION["getId"]);
        $ticket = ticketMgr::getTicketById($_SESSION["userRole"], $_SESSION["mdpRole"], $_SESSION["getId"]);
        $_SESSION["idticket"] = $ticket[0]["IdTicketSAV"];
        require("../vues/view_ticketDetail.php");
        break;
    case "formulairehistoval":
        try {
            $commentaire = trim($_POST["commentaire"]);
            if (strlen($commentaire) > 2) {
                ticketMgr::insertHistoTicket($_SESSION["userRole"], $_SESSION["mdpRole"], $_SESSION["idticket"], $_POST["commentaire"], $_SESSION["id"]);
            } else {
                throw new Exception("Erreur : Le commentaire doit être rempli");
            }
            if (isset($_POST['code'])) {
                ticketMgr::updateEtatTicket($_SESSION["userRole"], $_SESSION["mdpRole"], $_SESSION["idticket"], $_POST["code"]);
            }
            header("Refresh:0; url = ticketController.php?action=detailsTicket", false);
        } catch (Exception $e) {
            $_SESSION["msgErreurFormHisto"] = $e->getMessage();
            header("Refresh:0; url = ticketController.php?action=formulairehistorique", false);
        }
        break;
}
