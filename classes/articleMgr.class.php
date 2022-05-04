<?php

class articleMgr {

    public static function getAllArticles () {
        $requete = "SELECT LibArticle, PrixUniteArticle, StockArticle FROM article";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll();
        return $tab;
    }
}
