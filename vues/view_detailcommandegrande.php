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
        ?><tr>
            
      </button>
           <th scope="row"><?php echo $value["IdCommande"]?></th>
            <td><?php echo $value["EtatCommande"]?></td>
            <td><?php echo $value["DateCommande"]?></td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Détail de la commande</button>
            </td>
            
        </tr>

<?php
    }
?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Détails Articles Commande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="tabcom" class="table table-striped table-hover">
  <thead>
    <tr>
      <th  scope="col">ID Article</th>
      <th scope="col">Libellé </th>
      <th scope="col">Prix Unitaire</th>
      <th scope="col">Quantité Commandée</th>
      <th scope="col">Quantité Expédié</th>
      <th scope="col">Etat Article</th>

    </tr>
  </thead>
  <tbody>
    <?php
    foreach($tabcom as $key=>$value){ 
    ?><tr>
            
      </button>
           <th scope="row"><?php echo $value["IdCommande"]?></th>
            <td><?php echo $value["EtatCommande"]?></td>
            <td><?php echo $value["DateCommande"]?></td>
        </tr>
      
    </div>
  </div>
</div>
<?php
    }
?>
  </tbody>
</table>