<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Avancement du ticket : " . $_SESSION["idticket"];

ob_start();

?>
<h2>Avancement du ticket : " <?= $_SESSION["idticket"]; ?></h2>
<div id="formulaireErreur">
    <?php echo $msgErreur ?>
</div>
<form action="ticketcontroller.php" method="post" class="histoval">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="idticket" id="idticket" value="<?= $_SESSION["idticket"]; ?>" disabled>
        <label for="id">Numéro du ticket</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="commentaire" id="commentaire" maxlength="50">
        <label for="commentaire">Commentaire sur l'avancée</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="avancement" id="avancementcode" maxlength="4">
        <label for="avancement">code de fin du ticket</label>
        <div id="textehistocode">
            <p>Code pour update :</p>
            <p>TRM : Ticket Terminé </p>
            <p>SAV : Service Après-vente</p>
            <p>NPAI : N'habite Pas l'Adresse Indiqué</p>
            <p>NP : Non présent lors de la livraison</p>
            <p>EC : Erreur Client lors de la commmande</p>
            <p>EP : Erreur Préparation</p>

        </div>
    </div>
    <!-- <div class="form-floating mb-3">
        <input type="text" class="form-control" name="" id="" >
        <label for=""></label>
    </div> -->
    <input type="hidden" name="action" value="formulairehistoval" id="action">
    <input type="submit" value="Valider" class="btn btn-success">

</form>
<br>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_SESSION["idticket"] ?>" method="post" class="histoval">
    <input type="submit" value="annuler" class="btn btn-danger">
</form>
<br>
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
} ?>
<br>
<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>