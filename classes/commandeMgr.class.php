<?php

class CommandeMgr
{

    public static function getListCommande(int $choix = PDO::FETCH_ASSOC)
    {
        $sql = "SELECT * FROM commande";

        $resultset = Connexion::getConnexion("root", "")->query($sql);
        $records = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $records;
    }

    public static function getIdClientByIdCommande(string $user, string $password, string $idCommande, int $choix = PDO::FETCH_ASSOC)
    {
        $sql = 'SELECT IdClient FROM commande WHERE IdCommande="' . $idCommande . '"';
        $resultset = Connexion::getConnexion("root", "")->query($sql);
        $records = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $records;
    }

    public static function getCommande(string $id, int $choix = PDO::FETCH_ASSOC)
    {
        $sql = 'SELECT IdCommande, EtatCommande ,DateCommande FROM commande WHERE IdClient = "' . $id . '" ORDER BY DateCommande';
        $resultset = Connexion::getConnexion("root", "")->query($sql);
        $commande = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $commande;
    }

    public static function getCount(int $choix = PDO::FETCH_ASSOC)
    {
        $sql = 'SELECT COUNT(idTicketSAV) FROM ticketsav';
        $resultset = Connexion::getConnexion("root", "")->query($sql);
        $count = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $count;
    }

    public static function creationTicket(string $code, string $comm, string $idart, string $idempl, string $idcomm)
    {
        $countplus = self::getCount();
        $sql = 'INSERT INTO `ticketsav` (`IdTicketSAV`, `ProbTicketSAV`, `CommentaireTicketSAV`, `DateTicketSAV`, `IdArticle`, `IdEmploye`, `IdCommande`)
         VALUES ("TICK' . ($countplus[0]['COUNT(idTicketSAV)'] + 1) .
            '","' . $code . '","' . $comm . '", CURRENT_DATE(),"' . $idart . '","' . $idempl . '","' . $idcomm . '")';
        $resultset = Connexion::getConnexion("root", "")->query($sql);
        $crea = self::getCommande($idcomm);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $crea;
    }
}
