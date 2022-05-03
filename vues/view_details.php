<?php

spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Details";
$client = ClientMgr::getClient($_GET['id']);
$tabcom = CommandeMgr::getCommande($_GET['id']);
$articlecomm = ArticleMgr::getArticleCommande($_GET['CMD']);
ob_start();?>

<h1><?php echo $titre1 ?></h1>
<div class="contenu grid-container">

    <div id="grandediv">
    <?php if(isset($_GET['CMD']) AND (!isset($_POST['action']))) {
            $CMD = $_GET["CMD"];
            
        require "../vues/view_detailcommandegrande.php";
        }elseif(isset($_GET['id']) AND (!isset($_POST['action']))) {
    $id = $_GET["id"];
        require "../vues/view_detailclientgrande.php";
        }
        ?>
    </div>

    <div id="petitediv1">     
    <?php if(isset($_GET['CMD']) AND (!isset($_POST['action']))) {
    $CMD = $_GET["CMD"];
    
        require "../vues/view_detailclientpetit.php";
        }elseif(isset($_GET['id']) AND (!isset($_POST['action']))) {
            $id = $_GET["id"];
        require "../vues/view_detailcommandepetit.php";}
        ?> 
    </div>


        <div id="petitediv2">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint quasi aperiam eum, commodi autem dignissimos nulla ratione vel! Aperiam amet nihil, quia eum cum deleniti itaque voluptatibus quidem repellat non?
            Corporis facilis iste ratione, perspiciatis vitae deleniti? Ipsam dignissimos natus repellat doloremque nisi fugit cumque laboriosam voluptatum neque alias! Cum labore quaerat cupiditate sunt adipisci facere exercitationem recusandae odit facilis.
            Placeat necessitatibus sed magnam dolore iure temporibus pariatur assumenda ipsum unde, cumque vero mollitia aut quo exercitationem quam voluptate aliquid officiis earum cum similique at, accusantium magni voluptatibus excepturi. Aliquid.</p>
        </div>

    <div id="petitediv3">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint quasi aperiam eum, commodi autem dignissimos nulla ratione vel! Aperiam amet nihil, quia eum cum deleniti itaque voluptatibus quidem repellat non?
        Corporis facilis iste ratione, perspiciatis vitae deleniti? Ipsam dignissimos natus repellat doloremque nisi fugit cumque laboriosam voluptatum neque alias! Cum labore quaerat cupiditate sunt adipisci facere exercitationem recusandae odit facilis.
        Placeat necessitatibus sed magnam dolore iure temporibus pariatur assumenda ipsum unde, cumque vero mollitia aut quo exercitationem quam voluptate aliquid officiis earum cum similique at, accusantium magni voluptatibus excepturi. Aliquid.</p>
    </div>
    
</div>




<?php $contenu = ob_get_clean(); 

require "../vues/gabarit.php";



?>