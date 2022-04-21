<?php

class ConnexionMgr
{
    public static function controleconnexion(string $user, string $password)
    {
        $requete = "SELECT idEmploye, NomEmploye, PrenomEmploye, RoleEmploye FROM employe 
        WHERE LoginEmploye = '" . $user . "' AND MDPEmploye = '" . $password . "'";
        $resultat = Connexion::getConnexion("root", "")->query($requete);
        $tresultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
        if (empty($tresultat)) {
            throw new ConnexionMgrException("Erreur d'identifiant et de mot de passe");
        } else {
            return $tresultat;
        }
    }
}
