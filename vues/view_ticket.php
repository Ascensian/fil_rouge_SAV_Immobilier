<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
$titre = "Ticket";

ob_start(); ?>

<h1>Tickets SAV</h1>
<div id="ticketbtn">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="ticketSelect">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <input type="submit" value="recherche" name="action"></input>
</div>
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