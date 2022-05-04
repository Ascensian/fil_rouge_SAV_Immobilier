<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Ticket";

ob_start();
var_dump($_SESSION);
?>

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
<h2 class="title">Historique du ticket</h2>
<?php
if (!empty($histo)) {
?>
    <table class="table table-bordered table-striped " id="tableTicketDetail">
        <thead>
            <tr class="bg-primary">
                <th scope="col">Entrée dans l'historique</th>
                <th scope="col">Date d'avancement du ticket</th>
                <th scope="col">Commentaire sur l'avancé</th>
                <th scope="col">Identifiant de l'employé concerné</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($histo as $key => $infohisto) { ?>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $infohisto["DateModificationTicket"] ?></td>
                    <td><?= $infohisto["AvancementProblemeTicket"] ?></td>
                    <td><?= $infohisto["IdEmploye"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else {
    echo "Aucun suivi n'a été fait pour l'instant <br><br>";
}
if ($ticketfini[0]["CommentaireTicketSAV"] != "TRM" and $_SESSION["role"] == "SAV") {
?>
    <form action="ticketController.php?action=formulairehistorique" method="post">
        <input class="btn btn-primary" type="submit" value="Ajouter un avancement dans le ticket">
    </form>
    <br>
<?php } ?>
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