<?php

spl_autoload_register(function ($classe) {
  require "../classes/" . $classe . ".class.php";
});

$titre = "Detail Commande";

ob_start(); ?>

<h1>Details Commande</h1>

<div id="listarticle">

  <!-- CREATION DU TABLEAU ARTICLE -->

  <table id="tabarticle" class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID Article</th>
        <th scope="col">Libelle Article</th>
        <th scope="col">Prix Unitaire</th>
        <th scope="col">Quantité Commandée</th>
        <th scope="col">Quantité Expediée</th>
        <th scope="col">Etat Article</th>
        <th scope="col">Ticket SAV</th>
      </tr>
    </thead>
    <tbody>
      <?php

      // CREATION DYNAMIQUEMENT DES LIGNES DU TABLEAU ARTICLE 

      foreach ($tabart as $key => $value) {
        $test = ArticleMgr::getTicketArticle($_SESSION["userRole"],  $_SESSION["mdpRole"], $value["IdArticle"], $_SESSION["getCommande"]);

      ?><tr id=<?php echo $key ?>>

          <th scope="row"><?php echo $value["IdArticle"] ?></th>
          <th scope="row"><?php echo $value["LibArticle"] ?></th>
          <td><?php echo $value["PrixUniteArticle"] ?></td>
          <td><?php echo $value["QuantiteCommandeArticle"] ?></td>
          <td><?php echo $value["QuantiteExpedieArticle"] ?></td>
          <td><?php echo $value["EtatArticleCommande"] ?></td>
          <?php if ((empty($test))) { ?>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key ?>">Creer un Ticket</button></td>
          <?php } else { ?>
            <td><a href="ticketController.php?id=<?= $test[0]["IdTicketSAV"] ?>&action=detailsTicket"><?php echo $test[0]["IdTicketSAV"] ?></a></td>
          <?php } ?>
        </tr>
        <!-- CREATION DE LA MODAL FORMULAIRE D'AJOUT TICKET -->
        <!-- AJOUT DES CHAMPS PREREMPLI DYNAMIQUEMENT  -->



        <form action="controlerclient.php" method="POST">
          <div class="modal fade" id="exampleModal<?php echo $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php $key ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel<?php echo $key ?>">Creation de Ticket</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" value='<?= $value['IdArticle']; ?>' name="IdArticle">
                <div class="modal-body">
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom </label>
                    <div class="col-sm-10">
                      <input type="text" disabled class="form" name="nom" id="staticNom" value="<?php echo $client[0]["NomClient"] ?>">
                    </div>
                    <label for="staticEmail" class="col-sm-2 col-form-label">Prénom</label>
                    <div class="col-sm-10">
                      <input type="text" disabled class="form" id="staticPrenom" name="prenom" value="<?php echo $client[0]["PrenomClient"] ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ID Article</label>
                    <div class="col-sm-10">
                      <input type="text" disabled class="form" id="staticId" name="idart" value="<?php echo $value["IdArticle"] ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Libelle Article</label>
                    <div class="col-sm-10">
                      <input type="text" disabled class="form" id="staticLib" name="libart" value="<?php echo $value["LibArticle"] ?>">
                    </div>
                  </div>

                  <!-- CREATION DES MENUS DEROULANTS DU FORMULAIRE D'AJOUT POUR LES EMPLOYES ET LES CODES ERREURS -->
                  <div class="mb-3 row">
                    <label for="employe">Technicien</label>
                    <select name="employe" id="employe" require>
                      <option value="">--Choisir un Technicien--</option>
                      <?php foreach ($listempl as $key => $value) {
                        $listempl = EmployeMgr::getListEmploye($_SESSION["userRole"],  $_SESSION["mdpRole"]); ?>
                        <option value="<?php echo $listempl[$key]['IdEmploye']; ?>"><?php echo $value['IdEmploye']; ?> - <?php echo $value['NomEmploye'] . " " . $value['PrenomEmploye'] ?></option>
                      <?php } ?>
                    </select>

                    <div class="mb-3 row">
                      <label for="probleme">Probleme SAV</label>
                      <select name="probleme" id="probleme" require>
                        <option value="">--Choisir un code Problème--</option>
                        <option value="SAV">SAV - Service Après-Vente</option>
                        <option value="NP">NP - Non présent lors de la livraison</option>
                        <option value="NPAI">NPAI - N'habite pas à l'adresse indiquée</option>
                        <option value="EC">EC - Erreur client lors de la commande</option>
                        <option value="EP">EP - Erreur de préparation</option>
                      </select>
                    </div>
                    <div class="mb-3 row">
                      <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Entrez un commentaire (150 caractères)" require maxlength="150"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                      <input type="hidden" name="action" value="creation"></input>
                      <input type="hidden" name="CMD" value=<?php echo $_SESSION["getCommande"]; ?>></input>
                      <input type="submit" class="btn btn-primary" value="Creer"></input>
                    </div>
                  </div>
                </div>
              </div>
        </form>
      <?php
      }
      ?>

    </tbody>
  </table>


  <?php $contenu = ob_get_clean();

  require "../vues/gabarit.php";
