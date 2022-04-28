<?php // classes/ticketMgr.class.php

class TicketMgr
{
    public static function getAll(string $user, string $password, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = "SELECT * FROM ticketsav";

        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);

        return $tresultat;
    }
}
