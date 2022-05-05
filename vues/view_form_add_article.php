   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ajouter un article
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
        
        <form method="post" action="articleController.php">
            <label for="idArticle">Id de l'Article</label>
            <input type="text" name="idArticle" placeholder="EX : ART1">
            <label for="libArticle">Libellé article</label>
            <input type="text" name="libArticle" placeholder="EX : Pergola">
            <label for="prixUnitaire">Prix unitaire</label>
            <input type="text" name="prixUnitaire" placeholder="EX : 1000">
            <label for="stock">Stock</label>
            <input type="text" name="stock" placeholder="EX : 7">
            <input type="hidden" name="action" value="ajoutArticle">
            <input type="submit">
            
        </form>
       
        </div>

        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-success">Enregistrer</button>
        </div>
         -->
      
    </div>
  </div>
</div>
