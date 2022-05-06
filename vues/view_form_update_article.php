
<!-- Modal -->
<div class="modal fade" id="modifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier quantité article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="articleController.php" method="POST">
            <h6>Ancienne quantité</h6>
            <p></p>
            <label for="idArticle">Id de l'Article</label>
            <input type="text" name="idArticle" placeholder="EX : ART1">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-success">Enregistrer modification</button>
      </div>
    </div>
  </div>
</div>