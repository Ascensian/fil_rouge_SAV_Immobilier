    <?php
    require_once("../classes/clientMgr.class.php");
    require_once("../classes/employeMgr.class.php");
    require_once("../classes/commandeMgr.class.php");
    require_once("../classes/articleMgr.class.php");

    session_start();

    if ($_SESSION['role'] == "ADMIN" or !isset($_SESSION['role']) or $_SESSION["deconnexion"] == 1) {
        $_SESSION["msgErreur"] = "Désolé, ce n'est pas la page que vous cherchez";
        header("Refresh:0; url = ../index.php?action=connexion", false);
    }

    $action = "client";
    $msg = "";


    if (!isset($_SESSION["index"])) {
        $_SESSION["index"] = 0;
    } else if ($_SESSION["index"] == 1) {
        $_SESSION["index"] = 0;
    }



    if (isset($_GET['action']))
        $action = $_GET['action'];

    if (isset($_POST['action']))
        $action = $_POST['action'];



    switch ($action) {
        case "client":
            $tabclt = ClientMgr::getListClient($_SESSION["userRole"],  $_SESSION["mdpRole"]);
            require("../vues/view_client.php");
            break;
        case "creation":
            // var_dump($_POST)
            $listempl = EmployeMgr::getListEmploye($_SESSION["userRole"],  $_SESSION["mdpRole"]);
            $crea = CommandeMgr::creationTicket(
                $_SESSION["userRole"],
                $_SESSION["mdpRole"],
                $_POST['probleme'],
                $_POST['commentaire'],
                $_POST['IdArticle'],
                $_POST['employe'],
                $_POST['CMD']
            );
            $client = ClientMgr::getClient($_SESSION["userRole"],  $_SESSION["mdpRole"], $_SESSION["getIdClient"]);
            $tabart = ArticleMgr::getArticleCommande($_SESSION["userRole"],  $_SESSION["mdpRole"], $_SESSION["getCommande"]);
            require("../vues/view_detailcommande.php");
            break;
        case "modif":
            $modif =  ClientMgr::modifClient(
                $_SESSION["userRole"],
                $_SESSION["mdpRole"],
                $_GET['id'],
                $_GET['inputAddress'],
                $_GET['inputZip'],
                $_GET['inputCity'],
                $_GET['inputEmail']
            );
            $tabclt = ClientMgr::getListClient($_SESSION["userRole"],  $_SESSION["mdpRole"],);
            $action = $_GET['action'];
            $_SESSION["post"] = $action;
            $GET[$action] = "client";
            require("../vues/view_client.php");
            break;
        case "detailcomm":
            $listempl = EmployeMgr::getListEmploye($_SESSION["userRole"],  $_SESSION["mdpRole"]);
            $client = ClientMgr::getClient($_SESSION["userRole"],  $_SESSION["mdpRole"], $_GET['id']);
            $_SESSION["getIdClient"] = $_GET['id'];
            $tabart = ArticleMgr::getArticleCommande($_SESSION["userRole"],  $_SESSION["mdpRole"], $_GET['CMD']);
            $_SESSION["getCommande"] = $_GET['CMD'];
            require("../vues/view_detailcommande.php");
            break;
        case "detailclient":
            $id = $_GET["id"];
            $client = ClientMgr::getClient($_SESSION["userRole"],  $_SESSION["mdpRole"], $_GET['id']);
            $tabcom = CommandeMgr::getCommande($_SESSION["userRole"],  $_SESSION["mdpRole"], $_GET['id']);
            require("../vues/view_detailsclient.php");
            break;
    }
