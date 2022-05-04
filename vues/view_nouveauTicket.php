<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Nouveau ticket";
if (isset($_POST["compteur"])) {
    $_SESSION["compteur"] = intval($_POST["compteur"]);
} else {
    $_SESSION["compteur"] = 0;
}
$compteur = $_SESSION["compteur"];
ob_start();
var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];
?>
<h2>Nouveau ticket</h2>
<form action="ticketController" method="post">
    <?php switch ($compteur) {
        case 0: ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nomClient" id="nomClient" value="">
                <label for="nomClient">Nom du client</label>
            </div>
            <input type="hidden" name="compteur" value="<?php
                                                        if ($compteur < 1) {
                                                            echo 1;
                                                        }
                                                        ?>">
            <?php break;
        case 1:
            $client = ticketMgr::getCountClientByNom("root", "", $_POST["nomClient"]);
            $tclient = intval($client[0]["COUNT(NomClient)"]);
            var_dump($tclient);
            if ($client > 0) {
                $infoclient = TicketMgr::getClientByNom("root", "", $_POST["nomClient"]);
            ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nomClient" id="nomClient" value="">
                    <label for="nomClient">Nom du client</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="prenomClient" id="prenomClient" value="">
                    <label for="prenomClient">Prénom du client</label>
                </div>
                <table class="table table-bordered table-striped " id="tableTicket">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">Nom du client</th>
                            <th scope="col">Prenom du client</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($infoclient as $key => $information) { ?>
                            <tr>
                                <th scope="row"><?= $information["NomClient"] ?> </th>
                                <td><?= $information["PrenomClient"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
    <?php };


            break;
        case 2:
            break;
    } ?>
    <input type="hidden" name="action" value="formulaireNVTicket">
    <input type="submit" value="Valider">
</form>
<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>