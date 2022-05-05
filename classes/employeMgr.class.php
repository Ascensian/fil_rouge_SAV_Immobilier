<?php

class EmployeMgr{

    public static function getListEmploye(int $choix = PDO::FETCH_ASSOC){
       
            $sql = "SELECT IdEmploye, NomEmploye, PrenomEmploye FROM employe";
    
            $resultset = Connexion::getConnexion("root","")->query($sql);
            $listempl = $resultset->fetchAll($choix);
            $resultset->closeCursor();
            Connexion::disconnect();
        return $listempl;
        }
    

}