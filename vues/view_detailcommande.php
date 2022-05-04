<?php

spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Detail Commande";

ob_start();?>

<h1>Details Commande</h1>

<div id="listarticle">


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

    foreach($tabart as $key=>$value){ 
        $test = ArticleMgr::getTicketArticle($value["IdArticle"], $_GET["CMD"])
        ?><tr>
            
           <th scope="row"><?php echo $value["IdArticle"]?></th>
           <th scope="row"><?php echo $value["LibArticle"]?></th>
            <td><?php echo $value["PrixUniteArticle"]?></td>
            <td><?php echo $value["QuantiteCommandeArticle"]?></td>
            <td><?php echo $value["QuantiteExpedieArticle"]?></td>
            <td><?php echo $value["EtatArticleCommande"]?></td>
            <?php if((empty($test))){?>
            <td>Aucun Ticket</td>
            <?php } else { ?>
            <td><a href="ticketController.php?id=<?=$test[0]["IdTicketSAV"] ?>"><?php echo $test[0]["IdTicketSAV"] ?></a></td>
            <?php } ?>
            </tr>

<?php
    }
?>
  </tbody>
</table>


<?php $contenu = ob_get_clean(); 

require "../vues/gabarit.php";