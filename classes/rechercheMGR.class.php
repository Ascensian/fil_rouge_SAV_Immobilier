<?php

class rechercheMGR {
    
    public static function rechercheNomClient(string $nom) {
        
        $requete = "SELECT NomClient, PrenomClient FROM client WHERE NomClient LIKE '%" . $nom ."%'";
        echo $requete;
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function rechercheNumCommande(string $numCom) {
        $requete = "SELECT IdCommande from commande WHERE IdCommande LIKE '%" . $numCom ."%'";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function rechercheLibTicket (string $libTicket) {
        $requete = "SELECT ProbTicketSAV from ticketsav WHERE ticketsav LIKE '%" . $libTicket ."%'";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    
}
 
?>