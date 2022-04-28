<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
$titre = "Ticket";

ob_start(); ?>
<?php var_dump($_SESSION);
echo $action;
var_dump($_POST);
echo $_SERVER['PHP_SELF'];
?>
<h1>Tickets SAV</h1>
<div id="ticketbtn">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="article">
        <input type="submit" value="Rechercher">
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="date">
        <input type="submit" value="Rechercher">
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="action" value="code">
        <input type="submit" value="Rechercher">
    </form>
</div>
<?php $ticket = ticketMgr::getAll("root", "");
foreach ($ticket as $key => $infoticket) { ?>
    <div id="<?= $key ?>">

        <p><a href="">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
        <p>Date de création du ticket : <?= $infoticket["DateTicketSAV"] ?></p>
        <p>Numéro de Commande : <?= $infoticket["IdCommande"] ?></p>
        <p>Article concerné : <?= $infoticket["IdTicketSAV"] ?></p>
        <!-- <p>Commentaire du ticket : <?= $infoticket["CommentaireTicketSAV"] ?></p> -->
        </a>
    </div>
<?php }
?>


<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>