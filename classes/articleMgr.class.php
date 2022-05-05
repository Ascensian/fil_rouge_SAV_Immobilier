<?php

class articleMgr {

    public static function getAllArticles () {
        $requete = "SELECT LibArticle, PrixUniteArticle, StockArticle FROM article";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function addArticle () {
        $requete = "";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
    }

    public static function deleteArticle () {

    }

    public static function updateArticle () {

    }
}
