<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

session_start();

$action= "client";
$msg =""; 

if (!isset($_SESSION["index"])) {
    $_SESSION["index"] = 0;
} else if ($_SESSION["index"] == 1) {
    $_SESSION["index"] = 0;
}



if (isset($_GET['action'])) 
$action = $_GET['action'];   
        
if (isset($_POST['action'])) 
$action = $_POST['action'];   

// var_dump($_POST);

// if (isset($_GET['id']) AND (!isset($_POST['action']))) {
    
// }elseif (isset($_GET['CMD']) AND (!isset($_POST['action']))){
    

switch($action){
    case "client":
        $tabclt = ClientMgr::getListClient();
        require("../vues/view_client.php");
        break;
    case "creation":
        // var_dump($_POST)
        $listempl = EmployeMgr::getListEmploye();
        $crea = CommandeMgr::creationTicket($_POST['probleme'], $_POST['commentaire'],
                                                        $_POST['IdArticle'],$_POST['employe'], $_POST['CMD']);
                                                        $client = ClientMgr::getClient($_SESSION["getIdClient"]);
        $tabart = ArticleMgr::getArticleCommande($_SESSION["getCommande"]);
        require ("../vues/view_detailcommande.php");   
        break;
    case "modif":
        $modif =  ClientMgr::modifClient($_GET['id'], $_GET['inputAddress'], 
        $_GET['inputZip'], $_GET['inputCity'], $_GET['inputEmail']);
        $tabclt = ClientMgr::getListClient();
        $action = $_GET['action'];
        $_SESSION["post"] = $action;
        $GET[$action] = "client";
        require("../vues/view_client.php");
        break;
    case "detailcomm" : 
        $listempl = EmployeMgr::getListEmploye();
        $client = ClientMgr::getClient($_GET['id']);
        $_SESSION["getIdClient"] = $_GET['id'];
        $tabart = ArticleMgr::getArticleCommande($_GET['CMD']);
        $_SESSION["getCommande"] = $_GET['CMD'];
        require("../vues/view_detailcommande.php");
        break;
    case "detailclient":
        $id = $_GET["id"];
        $client = ClientMgr::getClient($_GET['id']);
        $tabcom = CommandeMgr::getCommande($_GET['id']);
        require("../vues/view_detailsclient.php");
        break;
    }
?>
