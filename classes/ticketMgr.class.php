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

    public static function getTicketsOrderBy(string $user, string $password, string $table, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = "SELECT * FROM ticketsav ORDER BY " . $table;
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);

        return $tresultat;
    }

    public static function getTicketById(string $user, string $password, string $id, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = 'SELECT * FROM ticketsav WHERE IdTicketSAV = "' . $id . '"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }

    public static function getHistoriqueById(string $user, string $password, string $id, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = 'SELECT * FROM historiqueticket WHERE IdTicketSAV = "' . $id . '"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }
}
