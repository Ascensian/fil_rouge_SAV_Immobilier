<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
$titre = "Ticket";

ob_start(); ?>
<?php var_dump($_SESSION);
echo $action;
var_dump($_POST);
var_dump($_GET);
echo $_SERVER['PHP_SELF'];

?>

<h2 class="title">Rechercher par type</h2>
<div id="ticketbtn">
    <?php if (!isset($_POST['action']) || $_POST['action'] == "ticket") {

    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="article">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="date">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="code">
        </form>
    <?php } else if ($_POST['action'] == "article") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input type="submit" value="ticket">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="date">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="code">
        </form>
    <?php } else if ($_POST['action'] == "date") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input type="submit" value="ticket">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="article">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="code">
        </form>
    <?php } else if ($_POST['action'] == "code") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input type="submit" value="ticket">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="article">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="date">
        </form>
    <?php }
    ?>
</div>
<h2 class="title">Tickets SAV</h2>
<?php if (!isset($_POST['action']) || $_POST['action'] == "ticket") {
    $ticket = ticketMgr::getAllTickets("root", "");
    foreach ($ticket as $key => $infoticket) { ?>
        <div id="<?= $key ?>">

            <p><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id= <?php echo $infoticket["IdTicketSAV"] ?>">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
            <p>Date de création du ticket : <?= $infoticket["DateTicketSAV"] ?></p>
            <p>Numéro de Commande : <?= $infoticket["IdCommande"] ?></p>
            <p>Article concerné : <?= $infoticket["IdTicketSAV"] ?></p>
            <p>Code lié à la commande ou à l'article : <?= $infoticket["CommentaireTicketSAV"] ?></p>
            <!-- <p>Commentaire du ticket : <?= $infoticket["CommentaireTicketSAV"] ?></p> -->
        </div>
    <?php }
} else if ($_POST['action'] == "article") {
    $ticket = ticketMgr::getTicketsOderBy("root", "", "IdArticle");
    foreach ($ticket as $key => $infoticket) { ?>
        <div id="<?= $key ?>">

            <p><a href="">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
            <p>Article concerné : <?= $infoticket["IdTicketSAV"] ?></p>
        </div>
    <?php }
} else if ($_POST['action'] == "date") {
    $ticket = ticketMgr::getTicketsOderBy("root", "", "DateTicketSAV");
    foreach ($ticket as $key => $infoticket) { ?>
        <div id="<?= $key ?>">
            <p><a href="">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
            <p>Date de création du ticket : <?= $infoticket["DateTicketSAV"] ?></p>
        </div>
    <?php }
} else if ($_POST['action'] == "code") {
    $ticket = ticketMgr::getTicketsOderBy("root", "", "CommentaireTicketSAV");
    foreach ($ticket as $key => $infoticket) { ?>
        <div id="<?= $key ?>">
            <p><a href="">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
            <p>Code lié à la commande ou à l'article : <?= $infoticket["CommentaireTicketSAV"] ?></p>
        </div>
<?php }
} ?>


<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>