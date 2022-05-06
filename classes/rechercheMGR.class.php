<?php

class rechercheMGR {
    
    public static function rechercheNomClient(string $nom) {
        
        $requete = "SELECT NomClient, PrenomClient FROM client WHERE NomClient LIKE '%" . $nom ."%'";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function rechercheNumCommande(string $numCom) {
        $requete = "SELECT IdCommande from commande WHERE EtatCommande OR IdCommande LIKE '%" . $numCom ."%'";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function rechercheLibTicket (string $libTicket) {
        $requete = "SELECT IdTicketSAV from ticketsav WHERE ProbTicketSAV OR IdTicketSAV LIKE '%" . $libTicket ."%'";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    
}
 
?>