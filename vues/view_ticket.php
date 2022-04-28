<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
$titre = "Ticket";

ob_start(); ?>

<h1>Tickets SAV</h1>

<?php $ticket = ticketMgr::getAll("root", "");
foreach ($ticket as $key => $infoticket) { ?>
    <div id="<?= $key ?>">

        <p><a href="">Numéro de ticket : <?= $infoticket["IdTicketSAV"] ?></a></p>
        <p>Date de création du ticket : <?= $infoticket["DateTicketSAV"] ?></p>
        <p>Numéro de Commande : <?= $infoticket["IdCommande"] ?></p>
        <p>Article concerné : <?= $infoticket["IdTicketSAV"] ?></p>
        <!-- <p>Commentaire du ticket : <?= $infoticket["CommentaireTicketSAV"] ?></p> -->*
        </a>
    </div>
<?php }
?>


<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>