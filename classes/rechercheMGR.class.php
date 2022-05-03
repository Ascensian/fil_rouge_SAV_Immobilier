<?php

class rechercheMGR {
    
    public static function rechercheNomClient(string $nom) {
        // préparation de la requete
        $requete = "SELECT NomClient, PrenomClient FROM client WHERE NomClient LIKE CONCAT('%', $nom, '%')";
        // recupération de la connexion et preparation de la requete
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        // 
    
    }

    public static function rechercheNumCommande(string $numCom) {
        $requete = "SELECT IdCommande from commande WHERE IdCommande LIKE CONCAT('%', $numCom, '%')";
    }

    public static function rechercheLibTicket (string $libTicket) {
        $requete = "SELECT ProbTicketSAV from ticketsav WHERE ticketsav LIKE CONCAT('%', $libTicket, '%')";
    }
}