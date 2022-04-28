<?php // classes/ticketMgr.class.php

class TicketMgr
{
    public static function getAllTickets(string $user, string $password, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = "SELECT * FROM ticketsav";

        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);

        return $tresultat;
    }

    public static function getTicketsOderBy(string $user, string $password, string $table, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = "SELECT * FROM ticketsav ORDER BY " . $table;
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);

        return $tresultat;
    }

    public static function getTicket(string $user, string $password, string $ticket, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = "SELECT * FROM ticketsav WHERE IdTicketSAV = " . $ticket;
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);

        return $tresultat;
    }
}
