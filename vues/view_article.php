<?php

$titre = "Article";

ob_start(); ?>

<h1>Articles</h1>
<?php 
  $tabArticles = articleMgr::getAllArticles();
  ?>

  <?php require("view_form_add_article.php") ?>
  
  
  <div class="row">

  <?php
  foreach ($tabArticles as $key => $value) { ?>
  <!-- début de loop -->
    <div class="card col-4" style="width: 25rem;">
    <img class="card-img-top" src="../images/<?= $key ?>.jpg" alt="Card image cap" style="width: 25rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $value["LibArticle"] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Prix unitaire: <?= $value["PrixUniteArticle"] ?> €</h6>
        <p class="card-subtitle mb-2 text-muted">Stock : <?= $value["StockArticle"] ?></p>
        <button type="button" class="btn btn-secondary">Modifier</button>
        <button type="button" class="btn btn-danger">Supprimer</button>
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