<?php
class ArticleMgr{

    public static function getListArticle(string $user, string $password,int $choix = PDO::FETCH_ASSOC){
        $sql = "SELECT * FROM article";
        $resultset = Connexion::getConnexion($user,$password)->query($sql);
        $listarticle = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $listarticle;
    }

    public static function getArticleCommande(string $user, string $password,string $cmdid,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT a.IdArticle, a.LibArticle , a.PrixUniteArticle, e.QuantiteCommandeArticle, e.QuantiteExpedieArticle, e.EtatArticleCommande 
                 FROM article a JOIN emballer e ON a.IdArticle = e.IdArticle  WHERE e.IdCommande = "'.$cmdid.'" ';
        $resultset = Connexion::getConnexion($user,$password)->query($sql);
        $tabart = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $tabart;
    }

    public static function getTicketArticle(string $user, string $password,$artid, $cmdid ,int $choix = PDO::FETCH_ASSOC){
        $sql = 'SELECT IdTicketSAV FROM `ticketsav` WHERE IdArticle = "'.$artid.'" AND IdCommande = "'.$cmdid.'" ';
        $resultset = Connexion::getConnexion($user,$password)->query($sql);
        $tick = $resultset->fetchAll($choix);
        $resultset->closeCursor();
        Connexion::disconnect();
    return $tick;
    }

    public static function getAllArticles (string $user, string $password) {
        $requete = "SELECT IdArticle,LibArticle, PrixUniteArticle, StockArticle FROM article";
        $resultat = Connexion::getConnexion($user,$password)->prepare($requete);
        $resultat->execute();
        $tab = $resultat->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }

    public static function addArticle(string $user, string $password,string $idArticle, string $libArticle, string $prixUnitaire, string $stock) {
        $otherIdArticle = $idArticle;
        $requete = "INSERT INTO `article`(`IdArticle`, `LibArticle`, `PrixUniteArticle`, `StockArticle`, `IdArticle_1`) 
                    VALUES (:idArticle, :libArticle, :prixUnitaire, :stock, :IdArticle1)";
        $resultat = Connexion::getConnexion($user,$password)->prepare($requete);
        $resultat->bindValue(':idArticle', $idArticle);
        $resultat->bindValue(':libArticle', $libArticle);
        $resultat->bindValue(':prixUnitaire', $prixUnitaire);
        $resultat->bindValue(':stock', $stock);
        $resultat->bindValue(':IdArticle1', $otherIdArticle);
        $resultat->execute();
    }

    // public static function deleteArticle () {

    // }

    // public static function updateArticle () {

    // }

    public static function getNumberArticles (string $user, string $password) {
        $requete = "SELECT COUNT(*) FROM `article`";
        $resultat = Connexion::getConnexion($user,$password)->prepare($requete);
        $resultat->execute();
        $count = $resultat->fetch(PDO::FETCH_ASSOC);
        return $count;
    }

    // public static function getStockNumber (string $user, string $password,string $id) {
    //     $requete = "SELECT StockArticle from article WHERE IdArticle = :id";
    //     $resultat = Connexion::getConnexion($user,$password)->prepare($requete);
        
    // }
}
