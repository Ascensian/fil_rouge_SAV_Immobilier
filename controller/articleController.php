<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

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
        $numberArticle = articleMgr::getNumberArticles($_SESSION["userRole"],  $_SESSION["mdpRole"]);
        require('../vues/view_article.php');
        break;
    case "ajoutArticle" :
        $numberArticle = articleMgr::getNumberArticles($_SESSION["userRole"],  $_SESSION["mdpRole"]);
        articleMgr::addArticle($_SESSION["userRole"],  $_SESSION["mdpRole"],$_POST['idArticle'], $_POST['libArticle'], $_POST['prixUnitaire'], $_POST['stock']);
        require('../vues/view_article.php');
        break;
    
}   

?>
