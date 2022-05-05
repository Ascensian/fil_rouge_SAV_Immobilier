<?php

spl_autoload_register(function ($classe) {
  require "../classes/" . $classe . ".class.php";
});

$titre = "Client";

ob_start(); ?>


<h1 id="titre">Clients</h1>
<div id="listclient">

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Num Client</th>
        <th scope="col">Adresse</th>
        <th scope="col">Code Postal</th>
        <th scope="col">Ville</th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach ($tabclt as $key => $value) {
      ?><tr onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $value['IdClient'] ?>&action=detailclient'">
          <th scope="row"><?php echo $value["IdClient"] ?></th>
          <td><?php echo $value["NomClient"] ?></td>
          <td><?php echo $value["PrenomClient"] ?></td>
          <td><?php echo $value["NumClient"] ?></td>
          <td><?php echo $value["AdresseClient"] ?></td>
          <td><?php echo $value["CPClient"] ?></td>
          <td><?php echo $value["VilleClient"] ?></td>
          </a>
        </tr>

      <?php
      }
      ?>
    </tbody>
  </table>


</div>

<?php $contenu = ob_get_clean();

require "../vues/gabarit.php";

?>