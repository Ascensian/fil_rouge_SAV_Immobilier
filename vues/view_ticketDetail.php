<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
$titre = "Ticket";

ob_start(); ?>
<?php
// var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];

?>
<h2 class="title">Détail du ticket</h2>
<?php
$ticket = ticketMgr::getTicket("root", "", $id);
// var_dump($ticket);
foreach ($ticket as $key => $infoticket) { ?>
    <div id="<?= $key ?>">

        <p><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id= <?php echo $infoticket["IdTicketSAV"] ?>">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
        <p>Date de création du ticket : <?= $infoticket["DateTicketSAV"] ?></p>
        <p>Numéro de Commande : <?= $infoticket["IdCommande"] ?></p>
        <p>Article concerné : <?= $infoticket["IdTicketSAV"] ?></p>
        <p>Code lié à la commande ou à l'article : <?= $infoticket["CommentaireTicketSAV"] ?></p>
        <!-- <p>Commentaire du ticket : <?= $infoticket["CommentaireTicketSAV"] ?></p> -->
    </div>
<?php } ?>
<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>