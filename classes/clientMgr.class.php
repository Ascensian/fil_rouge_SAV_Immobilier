<?php
require("./classes/connexion.class.php");
class ClientMgr{

    public static function getListClient(string $user, string $password, int $choix = PDO::FETCH_ASSOC){
		
        $sql = "SELECT * FROM client";

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
 


    public static function getClient(string $user, string $password, string $id,int $choix = PDO::FETCH_ASSOC){

        $sql = 'SELECT * FROM client WHERE IdClient = "'.$id.'"';

        $resultset = Connexion::getConnexion($user, $password)->query($sql);
        $client = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $client;
    }

    public static function modifClient(string $user, string $password, string $id, $adresse ,int $CP, string $ville ,string $email, int $choix = PDO::FETCH_ASSOC){


        $sql = 'UPDATE `client` SET `AdresseClient` = "'.$adresse.'", `CPClient` = "'.$CP.'",
         `VilleClient` = "'.$ville.'", `Email` = "'.$email.'" 
         WHERE `client`.`IdClient` = "'.$id.'"'; 
    
        $resultset = Connexion::getConnexion($user, $password)->query($sql);
        $modif = self::getClient($user, $password,$id);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $modif;
    }
}
?>
