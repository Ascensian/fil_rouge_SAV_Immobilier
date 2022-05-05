<?php

$titre = "Article";

ob_start(); ?>

<h1>Articles</h1>
<?php 
  $tabArticles = articleMgr::getAllArticles();
  ?>
  <div class="row">

  <?php
  foreach ($tabArticles as $key => $value) { ?>
  <!-- début de loop -->
    <div class="card col-4" style="width: 25rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $value["LibArticle"] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Prix unitaire: <?= $value["PrixUniteArticle"] ?></h6>
        <p class="card-subtitle mb-2 text-muted">Stock : <?= $value["StockArticle"] ?></p>
        <a href="#" class="card-link">Modifier</a>
        <a href="#" class="card-link">Supprimer</a>
      </div>
    </div>

    <?php }?>

  </div>
  <?php
  // var_dump($tabArticles);

    ?>

<?php $contenu = ob_get_clean();

require "../vues/gabarit.php";

?>