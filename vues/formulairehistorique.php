<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
require "../classes/appelTicketMgr.php";
$titre = "Avancement du ticket : " . $_SESSION["idticket"];

ob_start();
var_dump($_SESSION);
?>
<h2>Avancement du ticket : " <?= $_SESSION["idticket"]; ?></h2>
<form action="" method="post">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="idticket" id="id" value="<?= $_SESSION["idticket"]; ?>" disabled>
        <label for="id">Numéro du ticket</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="commentaire" id="commentaire" maxlength="50">
        <label for="commentaire">Commentaire sur l'avancée</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Avancement" id="avancement">
        <label for="avancement">code de fin du ticket</label>
        <p> Laisser le code de fin vide si le ticket n'est pas terminé ou mettre TRM pour indiquer qu'il est terminé</p>
    </div>
    <!-- <div class="form-floating mb-3">
        <input type="text" class="form-control" name="" id="" >
        <label for=""></label>
    </div> -->
</form>

<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>