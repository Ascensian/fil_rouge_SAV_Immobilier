<?php

$titre = "Résultat(s) recherche";

ob_start();
?>
    <div id="searchValue">
        <h4>Terme de recherche : '<?= $_POST["valeurRecherche"] ?>'</h4>
    </div>

    <div>
        <h5>Client(s) trouvé(s) : '<?= count($tabClient) ?>'</h5>
        <table class="table table-bordered table-striped ">
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
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>EtatCommande</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($tabCommande as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["IdCommande"] ?></td>
                        <td><?php echo $value["EtatCommande"] ?></td>
                        <td><a href="">Edit</a></td>
                    </tr>
                    <?php
                }
             ?>
                
            </tbody>
        </table>
        
    </div>

    <div>
        <h5>Ticket trouvé(s) : <?= count($tabTicket) ?></h5>
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>ID Ticket</th>
                    <th>Problème ticket</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($tabTicket as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["IdTicketSAV"] ?></td>
                        <td><?php echo $value["ProbTicketSAV"] ?></td>
                        <td><a href="">Edit</a></td>
                    </tr>
                    <?php
                }
             ?>
                
            </tbody>
        </table>
        
       
    </div>


<?php $contenu = ob_get_clean();?>


<?php require "../vues/gabarit.php"; ?>
