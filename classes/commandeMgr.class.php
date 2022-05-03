<?php

class CommandeMgr{

    public static function getListCommande(int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT * FROM commande";

        $resultset = Connexion::getConnexion("root","")->query($sql);
        $records = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $records;
    }

    public static function getCommande(string $id,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT IdCommande, EtatCommande ,DateCommande FROM commande WHERE IdClient = "'.$id.'" ORDER BY DateCommande';
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $commande = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $commande;
    }

}

?>