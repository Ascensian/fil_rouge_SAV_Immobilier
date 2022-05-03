<table id="tabcom" class="table table-striped table-hover">
  <thead>
    <tr>
      <th  scope="col">ID commande</th>
      <th scope="col">Etat Commande</th>
      <th scope="col">Date de commande</th>

    </tr>
  </thead>
  <tbody>
    <?php
    foreach($tabcom as $key=>$value){ 
        ?><tr id=<?php echo $value['IdCommande']?> class="lignecomm">
           <th scope="row"><?php echo $value["IdCommande"]?></th>
            <td><?php echo $value["EtatCommande"]?></td>
            <td><?php echo $value["DateCommande"]?></td>
        </tr>

<?php
    }
?>
  </tbody>
</table>
