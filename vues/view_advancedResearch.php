<?php

$titre = "advancedSearch";

ob_start();?>

<h1>recherche avancée</h1>

<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option selected>RECHERCHER PAR</option>



  <option value="1"><a href="./vues/recherche/clientRecherche.php"><?php if(isset($_POST["action"])){$action = "clientRecherche";}?>CLIENT</a></option>



  <option value="2">COMMANDE<?php if(isset($_POST["action"])){
                $action = "commandeRecherche";}?></option>
  <option value="3">ARTICLE<?php if(isset($_POST["action"])){
                $action = "articleRecherche";}?></option>
  <option value="4">TICKET<?php if(isset($_POST["action"])){
                $action = "ticketRecherche";}?></option>
  <option value="5">GARANTIE<?php if(isset($_POST["action"])){
                $action = "garantieRecherche";}?></option>
</select>

<a href="./vues/recherche/clientRecherche.php">Test</a>

<?php $contenu = ob_get_clean(); ?>


<?php require "../vues/gabarit.php"?>

