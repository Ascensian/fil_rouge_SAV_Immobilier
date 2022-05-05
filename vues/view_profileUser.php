<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Ticket";

ob_start();
// var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];

?>
<h2>Profile de <?= $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></h2>
<table class="table table-bordered table-striped " id="tableTicketDetail">
    <thead>
        <tr class="bg-primary">
            <th scope="col">Identifiant </th>
            <th scope="col">Nom </th>
            <th scope="col">Prénom</th>
            <th scope="col">Numéro de téléphone</th>
            <th scope="col">Rôle de l'employe</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($employe as $key => $infoemploye) { ?>

            <tr>
                <th scope="row"><?= $infoemploye["IdEmploye"] ?></th>
                <td><?= $infoemploye["NomEmploye"] ?></td>
                <td><?= $infoemploye["PrenomEmploye"] ?></td>
                <td><?= $infoemploye["NumEmploye"] ?></td>
                <td><?= $infoemploye["RoleEmploye"] ?></td>
            </tr>


        <?php } ?>
    </tbody>
</table>

<?php $contenu = ob_get_clean();


require "vues/gabarit.php"

?>