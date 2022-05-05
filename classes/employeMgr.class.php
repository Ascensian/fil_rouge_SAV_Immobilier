<?php

class employeMgr
{
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
