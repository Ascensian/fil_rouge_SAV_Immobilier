<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Nouveau ticket";

ob_start();
var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];
?>
<h2>Nouveau ticket</h2>
<form action="ticketController" method="post">
    <input type="hidden" name="compteur" value="<?php
                                                if ($compteur < 1) {
                                                    echo 1;
                                                } else {
                                                    echo $compteur + 1;
                                                }
                                                ?>">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="nomClient" id="nomClient" value="<?php if ($compteur > 1) {
                                                                                            echo $_SESSION["nomClientRetenu"];
                                                                                        } ?>" <?php if ($compteur > 1) {
                                                                                                    echo "disabled";
                                                                                                } ?>>
        <label for="nomClient">Nom du client</label>
    </div>
    <?php if ($compteur > 0) {
    ?>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="prenomClient" id="prenomClient" value="<?php if ($compteur > 1) {
                                                                                                        echo $_SESSION["prenomClientRetenu"];
                                                                                                    } ?>" <?php if ($compteur > 1) {
                                                                                                                echo "disabled";
                                                                                                            } ?>>
            <label for="prenomClient">Prénom du client</label>
        </div>
    <?php }
    if ($compteur > 1) { ?>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="numCommande" id="numCommande" value="<?php if ($compteur > 2) {
                                                                                                    echo $_SESSION["numCommande"];
                                                                                                } ?>" <?php if ($compteur > 2) {
                                                                                                            echo "disabled";
                                                                                                        } ?>>
            <label for="numCommande">Numéro de commande</label>
        </div>
    <?php }
    if ($compteur > 2) { ?>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="idArticle" id="idArticle">
            <label for="idArticle">Code de l'Article</label>
        </div>
    <?php }
    ?>

    <?php switch ($compteur) {
        case 1:
    ?>
            <table class="table table-bordered table-striped " id="tableTicket">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">Nom du client</th>
                        <th scope="col">Prenom du client</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["infoClient"] as $key => $information) { ?>
                        <tr>
                            <th scope="row"><?= $information["NomClient"] ?> </th>
                            <td><?= $information["PrenomClient"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
            break;
        case 2: ?>
            <table class="table table-bordered table-striped " id="tableTicket">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">Numéro de commande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["infoCommande"] as $key => $information) { ?>
                        <tr>
                            <th scope="row"><?= $information["IdCommande"] ?> </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php break;
        case 3: ?>
            <table class="table table-bordered table-striped " id="tableTicket">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">Numéro de commande</th>
                        <th scope="col">Nom de l'article</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["infoArticle"] as $key => $information) { ?>
                        <tr>
                            <th scope="row"><?= $information["IdArticle"] ?> </th>
                            <th><?= $information["LibArticle"] ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    <?php break;
    } ?>
    <input type="hidden" name="action" value="formulaireNVTicket">
    <input type="submit" value="Valider">
</form>
<?php if ($compteur > 0) { ?>
    <form action="ticketController" method="post">
        <input type="hidden" name="action" value="formulaireNVTicket">
        <input type="hidden" name="compteur" value="<?php echo ($_SESSION["compteur"] - 1) ?>">
        <input type="submit" value="Retour en arrière">
    </form>
<?php } ?>
<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>