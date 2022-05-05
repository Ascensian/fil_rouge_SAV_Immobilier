<?php

$titre = "Résultat(s) recherche";

ob_start();
?>
    <div id="searchValue">
        <h4>Terme de recherche : '<?= $_POST["valeurRecherche"] ?>'</h4>
    </div>

    <div>
        <h5>Client(s) trouvé(s) : '<?= count($tabClient) ?>'</h5>
        <?php foreach ($tabClient as $key => $value) 
             echo $value["NomClient"] . " " . $value["PrenomClient"];
        ?>
    </div>

    <div>
        <h5>Commande trouvée(s) : <?= count($tabCommande) ?></h5>
        <?php foreach ($tabCommande as $key =>$value) 
            echo $value["IdCommande"];
        ?>
    </div>

    <div>
        <h5>Ticket trouvé(s) : <?= count($tabTicket) ?></h5>
        <?php foreach ($tabTicket as $key =>$value) 
            echo $value["IdTicketSAV"];
        ?>
    </div>


<?php $contenu = ob_get_clean();?>


<?php require "../vues/gabarit.php"; ?>
