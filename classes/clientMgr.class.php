<?php

class ClientMgr{

    public static function getListClient(int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT * FROM client";

        $resultset = Connexion::getConnexion("root","")->query($sql);
        $records = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $records;
    }


 


    public static function getClient(string $id,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT * FROM client WHERE IdClient = "'.$id.'"';

        $resultset = Connexion::getConnexion("root","")->query($sql);
        $client = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $client;
    }

    
}
?>
