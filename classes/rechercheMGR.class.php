<?php
require_once("../classes/connexion.class.php");
class rechercheMGR
{

    public static function rechercheNomClient(string $user, string $password, string $nom)
    {

        $requete = "SELECT IdClient, NomClient, PrenomClient FROM client WHERE NomClient LIKE '%" . $nom . "%'";
        $resultat = Connexion::getConnexion($user, $password)->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function rechercheNumCommande(string $user, string $password, string $numCom)
    {
        $requete = "SELECT IdCommande, EtatCommande, IdClient from commande WHERE IdCommande LIKE '%" . $numCom . "%'";
        $resultat = Connexion::getConnexion($user, $password)->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function rechercheLibTicket(string $user, string $password, string $libTicket)
    {
        $requete = "SELECT IdTicketSAV, ProbTicketSAV from ticketsav WHERE IdTicketSAV LIKE '%" . $libTicket . "%'";
        $resultat = Connexion::getConnexion($user, $password)->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }
}
