<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});


session_start();
// var_dump($_SESSION);
if ($_SESSION['role'] == "ADMIN" or !isset($_SESSION['role'])) {
    header("Refresh:0; url = ../index.php?action=dashboard", false);
}
$action = "ticket";
$msgErreur = "";
if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $_SESSION["post"] = $action;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $_SESSION["get"] = $action;
}


$table = "";
if ($action == "article") {
    $table = "IdArticle";
} else if ($action == "date") {
    $table = "DateTicketSAV";
} else if ($action == "code") {
    $table = "CommentaireTicketSAV";
}
if ($table != "") {
    $ticket = ticketMgr::getTicketsOrderBy("root", "", $table);
} else {
    $ticket = ticketMgr::getAllTickets("root", "");
}
switch ($action) {
    case "ticket":
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
        $histo = ticketMgr::getHistoriqueById("root", "", $_SESSION["getId"]);
        require("../vues/formulairehistorique.php");
        break;
    case "detailsTicket":
        if (isset($_GET['id'])) {
            $_SESSION["getId"] = $_GET["id"];
        }
        $ticketfini = ticketMgr::getTicketFini("root", "", $_SESSION["getId"]);
        $histo = ticketMgr::getHistoriqueById("root", "", $_SESSION["getId"]);
        $ticket = ticketMgr::getTicketById("root", "", $_SESSION["getId"]);
        $_SESSION["idticket"] = $ticket[0]["IdTicketSAV"];
        require("../vues/view_ticketDetail.php");
        break;
    case "formulairehistoval":
        try {
            $commentaire = trim($_POST["commentaire"]);
            if (strlen($commentaire) > 2) {
                ticketMgr::insertHistoTicket("root", "", $_SESSION["idticket"], $_POST["commentaire"], $_SESSION["id"]);
            } else {
                throw new Exception("Erreur : Le commentaire doit être rempli");
            }
            if (isset($_POST['code'])) {
                ticketMgr::updateEtatTicket("root", "", $_SESSION["idticket"], $_POST["code"]);
            }
            header("Refresh:0; url = ticketController.php?action=detailsTicket", false);
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            header("Refresh:0; url = ticketController.php?action=formulairehistorique", false);
        }
        break;
}
