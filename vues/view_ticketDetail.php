<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
require "../classes/appelTicketMgr.php";
$titre = "Ticket";

ob_start(); ?>

<h2 class="title">Détail du ticket</h2>
<table class="table table-bordered table-striped " id="tableTicketDetail">
    <thead>
        <tr class="bg-primary">
            <th scope="col">Numéro de ticket</th>
            <th scope="col">Date de création</th>
            <th scope="col">Numéro de commande</th>
            <th scope="col">Article concerné</th>
            <th scope="col">Code lié à la commande ou à l'article </th>
            <th scope="col">Commentaire</th>
            <th scope="col">Employé ayant créé le ticket</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $ticket = getTicket($id);
        foreach ($ticket as $key => $infoticket) { ?>

            <tr>
                <th scope="row"><?= $infoticket["IdTicketSAV"] ?></th>
                <td><?= $infoticket["DateTicketSAV"] ?></td>
                <td><?= $infoticket["IdCommande"] ?></td>
                <td><?php if ($infoticket["IdArticle"] == NULL) {
                        echo "La commande est concernée";
                    } else {
                        echo $infoticket["IdArticle"];
                    } ?></td>
                <td><?= $infoticket["CommentaireTicketSAV"] ?></td>
                <td>><?= $infoticket["ProbTicketSAV"] ?></td>
                <td><?= $infoticket["IdEmploye"] ?></td>
            </tr>


        <?php } ?>
    </tbody>
</table>

<a href="ticketController.php?action=
<?php
if (empty($_SESSION['post'])) {
    echo "ticket";
} else {
    echo $_SESSION['post'];
}
?>">Retour à la page précédente</a>
<br>
<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>