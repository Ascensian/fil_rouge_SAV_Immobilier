<?php

class articleMgr {

    public static function getAllArticles () {
        $requete = "SELECT LibArticle, PrixUniteArticle, StockArticle FROM article";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function addArticle(string $idArticle, string $libArticle, string $prixUnitaire, string $stock) {
        $otherIdArticle = $idArticle;
        $requete = "INSERT INTO `article`(`IdArticle`, `LibArticle`, `PrixUniteArticle`, `StockArticle`, `IdArticle_1`) 
                    VALUES (:idArticle, :libArticle, :prixUnitaire, :stock, :IdArticle1)";
        $resultat = Connexion::getConnexion("root", "")->prepare($requete);
        $resultat->bindValue(':idArticle', $idArticle);
        $resultat->bindValue(':libArticle', $libArticle);
        $resultat->bindValue(':prixUnitaire', $prixUnitaire);
        $resultat->bindValue(':stock', $stock);
        $resultat->bindValue(':IdArticle1', $otherIdArticle);
        $resultat->execute();
    }

    public static function deleteArticle () {

    }

    public static function updateArticle () {

    }
}
