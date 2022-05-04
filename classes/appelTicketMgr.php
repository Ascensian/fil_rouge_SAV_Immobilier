<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});


function getTickets(string $action = ""): array
{
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
    return $ticket;
}

function getTicket(string $id)
{
    $id = trim($id);
    $ticket = ticketMgr::getTicketById("root", "", $id);
    return $ticket;
}

function getTicketHistorique(string $id)
{
    $id = trim($id);
    $histo = ticketMgr::getHistoriqueById("root", "", $id);
    return $histo;
}
