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



}

?>