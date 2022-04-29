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



}

?>