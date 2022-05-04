<?php

class rechercheMGR {
    
    public static function rechercheNomClient(string $nom) {
        // requete sql
        $requete = "SELECT NomClient, PrenomClient FROM client WHERE NomClient LIKE CONCAT('%', $nom, '%')";
        // recupération de la connexion et preparation de la requete
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        // execution de la requete
        $resultat->execute();
        $tab = $resultat->fetchAll();
        return $tab;
    }

    public static function rechercheNumCommande(string $numCom) {
        $requete = "SELECT IdCommande from commande WHERE IdCommande LIKE CONCAT('%', $numCom, '%')";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        // execution de la requete
        $resultat->execute();
        $tab = $resultat->fetchAll();
        return $tab;
    }

    public static function rechercheLibTicket (string $libTicket) {
        $requete = "SELECT ProbTicketSAV from ticketsav WHERE ticketsav LIKE CONCAT('%', $libTicket, '%')";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        // execution de la requete
        $resultat->execute();
        $tab = $resultat->fetchAll();
        return $tab;
    }
}
 
?>