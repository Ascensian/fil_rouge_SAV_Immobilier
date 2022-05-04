<?php

spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Commande";

ob_start();?>
<?php 
$tabclt = CommandeMgr::getListCommande();
?>

<h1>Commandes</h1>

<div id="listcommande">


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID commande</th>
      <th scope="col">ID Client</th>
      <th scope="col">Etat Commande</th>
      <th scope="col">Date d'Expedition</th>
      <th scope="col">Date de commande</th>

    </tr>
  </thead>
  <tbody>
    <?php

    foreach($tabclt as $key=>$value){ 
        ?><tr onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>?CMD=<?php echo $value['IdCommande'] ?>'">
           <th scope="row"><?php echo $value["IdCommande"]?></th>
           <th scope="row"><?php echo $value["IdClient"]?></th>
            <td><?php echo $value["EtatCommande"]?></td>
            <td><?php echo $value["DateExpeditionCommande"]?></td>
            <td><?php echo $value["DateCommande"]?></td>
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