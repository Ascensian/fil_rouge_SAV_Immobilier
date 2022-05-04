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



if (isset($_GET['action'])) {
    if($_GET['action'] == 'modif'){       
        $modif =  ClientMgr::modifClient($_GET['id'], $_GET['inputAddress'], 
        $_GET['inputZip'], $_GET['inputCity'], $_GET['inputEmail']);
        $_GET['action'] = "client";
    $action = $_GET['action'];
    $_SESSION["post"] = $action;
    $GET[$action] = "client";
}
}



if (isset($_GET['id']) AND (!isset($_POST['action']))) {
    $id = $_GET["id"];
    $client = ClientMgr::getClient($_GET['id']);
    $tabcom = CommandeMgr::getCommande($_GET['id']);
    require("../vues/view_details.php");
}elseif (isset($_GET['CMD']) AND (!isset($_POST['action']))){
    $tabart = ArticleMgr::getArticleCommande($_GET['CMD']);
    require("../vues/view_detailcommande.php");
}else{
switch($action){
    case "client":
        $tabclt = ClientMgr::getListClient();
        require("../vues/view_client.php");
        break;
    // case "modif":
    //     $modif = ClientMgr::modifClient($_GET['id'],$_GET['inputAdress'], $_GET['inpuZip'], $_GET['inputCity'], $_GET['inputEmail']);
    //     require("../vues/view_client.php");
    }
}
?>
