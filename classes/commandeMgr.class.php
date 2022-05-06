<?php

class CommandeMgr{

    public static function getListCommande(string $user, string $password,int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT * FROM commande";

        $resultset = Connexion::getConnexion($user, $password)->query($sql);
        $records = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $records;
    }

    public static function getCommande(string $user, string $password,string $id,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT IdCommande, EtatCommande ,DateCommande FROM commande WHERE IdClient = "'.$id.'" ORDER BY DateCommande';
        $resultset = Connexion::getConnexion($user, $password)->query($sql);
        $commande = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $commande;
    }

    public static function getCount(string $user, string $password,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT COUNT(idTicketSAV) FROM ticketsav' ; 
         $resultset = Connexion::getConnexion($user, $password)->query($sql);
         $count = $resultset->fetchAll($choix);
         $resultset->closeCursor();
         Connexion::disconnect();
         return $count;
    }

    public static function creationTicket(string $user, string $password,string $code, string $comm, string $idart , string $idempl, string $idcomm ){
        $countplus = self::getCount($user, $password);
        $sql = 'INSERT INTO `ticketsav` (`IdTicketSAV`, `ProbTicketSAV`, `CommentaireTicketSAV`, `IdArticle`, `IdEmploye`, `IdCommande`)
         VALUES ("TICK'.($countplus[0]['COUNT(idTicketSAV)'] + 1).
         '","'.$code.'","'.$comm.'","'.$idart.'","'.$idempl.'","'.$idcomm.'")';
         $resultset = Connexion::getConnexion($user, $password)->query($sql);
         $crea = self::getCommande($user, $password, $idcomm);
         $resultset->closeCursor();
         Connexion::disconnect();
         return $crea;
    }
}

?>