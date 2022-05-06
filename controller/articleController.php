<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();
if ($_SESSION['role'] == "ADMIN" or !isset($_SESSION['role']) or $_SESSION["deconnexion"] == 1) {
    $_SESSION["msgErreur"] = "Désolé, ce n'est pas la page que vous cherchez";
    header("Refresh:0; url = ../index.php?action=connexion", false);
}
$action = "article";


if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}

if (isset($_POST["action"]) == 'ajoutArticle') {
    $action = $_POST["action"];
}




switch ($action) {
    case "article" :
        $numberArticle = articleMgr::getNumberArticles();
        require('../vues/view_article.php');
        break;
    case "ajoutArticle" :
        $numberArticle = articleMgr::getNumberArticles();
        articleMgr::addArticle($_POST['idArticle'], $_POST['libArticle'], $_POST['prixUnitaire'], $_POST['stock']);
        require('../vues/view_article.php');
        break;
    
}
