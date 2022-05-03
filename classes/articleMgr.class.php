<?php

class ArticleMgr{

    public static function getListCommande(int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT * FROM article";
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $listarticle = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $listarticle;
    }

    public static function getArticleCommande(string $cmdid,int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT a.IdArticle, a.LibArticle , a.PrixUniteArticle, e.QuantiteCommandeArticle, e.EtatArticleCommande  FROM article a JOIN emballer e ON a.IdArticle = e.IdArticle WHERE e.IdCommande = '.$cmdid.'";
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $articlecomm = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $articlecomm;
    }

}

?>