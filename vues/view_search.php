<?php

$titre = "Résultat(s) recherche";

ob_start();
?>
    <div id="searchValue">
        <h4>Terme de recherche : '<?= $_POST["valeurRecherche"] ?>'</h4>
    </div>

    <div>
        <h5>Client(s) trouvé(s) : '<?= count($tabClient) ?>'</h5>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($tabClient as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["NomClient"] ?></td>
                        <td><?php echo $value["PrenomClient"] ?></td>
                        <td><a href="">Edit</a></td>
                    </tr>
                    <?php
                }
             ?>
                
            </tbody>
        </table>
        
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
