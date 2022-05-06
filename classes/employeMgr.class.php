<?php
class EmployeMgr
{

    public static function getListEmploye(string $user, string $password,int $choix = PDO::FETCH_ASSOC)
    {

        $sql = "SELECT IdEmploye, NomEmploye, PrenomEmploye FROM employe";

        $resultset = Connexion::getConnexion($user, $password)->query($sql);
        $listempl = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
        return $listempl;
    }

    public static function getEmployes(string $user, string $password, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = "SELECT * FROM employe";
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }

    public static function getEmploye(string $user, string $password, string $idEmploye, int $typeEnregisterment = PDO::FETCH_ASSOC)
    {
        $requete = 'SELECT * FROM employe WHERE IdEmploye ="' . $idEmploye . '"';
        $resultat = Connexion::getConnexion($user, $password)->query($requete);
        $tresultat = $resultat->fetchAll($typeEnregisterment);
        return $tresultat;
    }
}
