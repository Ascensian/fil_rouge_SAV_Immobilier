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

    public static function insertHistoTicket(string $user, string $password, string $idTicket, string $com, string $idEmploye)
    {
        $requete = 'INSERT INTO `historiqueticket`(`IdHistoriqueTicket`, `DateModificationTicket`, `AvancementProblemeTicket`, `IdEmploye`, `IdTicketSAV`) VALUES (0 , CURRENT_DATE() , "' . $com . '" , "' . $idEmploye . '" , "' . $idTicket . '")';
        Connexion::getConnexion($user, $password)->query($requete);
        return self::getHistoriqueById($user, $password, $idTicket);
    }

    public static function updateEtatTicket(string $user, string $password, string $idTicket, string $code)
    {
        $requete = 'UPDATE `ticketsav` SET `CommentaireTicketSAV`="' . strtoupper($code) . '" WHERE IdTicketSAV = "' . $idTicket . '"';
        Connexion::getConnexion($user, $password)->query($requete);
    }

    public static function getTicketFini(string $user, string $password, string $idTicket, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = 'SELECT CommentaireTicketSAV FROM `ticketsav` WHERE IdTicketSAV = "' . $idTicket . '"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }

    // Doit aller dans le manager de client
    public static function getCountClientByNom(string $user, string $password, string $nomClient, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $nomClient = trim($nomClient);
        $requete = 'SELECT COUNT(NomClient) FROM client WHERE NomClient LIKE "%' . $nomClient . '%"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }


    public static function getClientByNom(string $user, string $password, string $nomClient, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $nomClient = trim($nomClient);
        $requete = 'SELECT * FROM client WHERE NomClient LIKE "%' . $nomClient . '%"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }

    //Doit aller dans le manager de commandes
    public static function getCommandesByNomAndPrenom(string $user, string $password, string $nomClient, string $prenomClient, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $nomClient = trim($nomClient);
        $prenomClient = trim($prenomClient);
        $requete = 'SELECT c.IdCommande, cl.IdClient FROM commande c JOIN client cl on c.IdClient = cl.IdClient WHERE cl.NomClient = "' . $nomClient . '" AND cl.PrenomClient = "' . $prenomClient . '"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }

    // Doit aller dans le manager d'articles
    public static function getArticlesByIdCommande(string $user, string $password, string $numCommande, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $numCommande = trim($numCommande);
        $requete = 'SELECT e.IdArticle, a.LibArticle FROM emballer e JOIN article a ON e.IdArticle = a.IdArticle WHERE IdCommande ="' . $numCommande . '"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }
}
