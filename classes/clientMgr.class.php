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

    public static function modifClient(string $id, $adresse ,int $CP, string $ville ,string $email, int $choix = PDO::FETCH_ASSOC){


        $sql = 'UPDATE `client` SET `AdresseClient` = "'.$adresse.'", `CPClient` = "'.$CP.'",
         `VilleClient` = "'.$ville.'", `Email` = "'.$email.'" 
         WHERE `client`.`IdClient` = "'.$id.'"'; 
    
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $modif = self::getClient($id);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $modif;
    }
}
?>
