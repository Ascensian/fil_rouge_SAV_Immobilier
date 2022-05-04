<?php

class ArticleMgr{

    public static function getListArticle(int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT * FROM article";
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $listarticle = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $listarticle;
    }

    public static function getArticleCommande(string $cmdid,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT a.IdArticle, a.LibArticle , a.PrixUniteArticle, e.QuantiteCommandeArticle, e.QuantiteExpedieArticle, e.EtatArticleCommande 
                 FROM article a JOIN emballer e ON a.IdArticle = e.IdArticle  WHERE e.IdCommande = "'.$cmdid.'" ';
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $tabart = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $tabart;
    }

    public static function getTicketArticle($artid, $cmdid ,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT IdTicketSAV FROM `ticketsav` WHERE IdArticle = "'.$artid.'" AND IdCommande = "'.$cmdid.'" ';
        $resultset = Connexion::getConnexion("root","")->query($sql);
        $tick = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $tick;
    }



}

?>