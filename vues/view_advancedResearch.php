<?php

$titre = "advancedSearch";

ob_start();?>

<h1>recherche avancée</h1>

<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option selected>RECHERCHER PAR</option>
  <option value="1">CLIENT</option>
  <option value="2">TICKET</option>
  <option value="3"></option>
</select>

<?php $contenu = ob_get_clean(); ?>



<?php require "../vues/gabarit.php"

?>
