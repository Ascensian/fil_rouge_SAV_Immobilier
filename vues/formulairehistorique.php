<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Avancement du ticket : " . $_SESSION["idticket"];

ob_start();
var_dump($_SESSION);
?>
<h2>Avancement du ticket : " <?= $_SESSION["idticket"]; ?></h2>
<form action="ticketcontroller.php" method="post" class="histoval">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="idticket" id="id" value="<?= $_SESSION["idticket"]; ?>" disabled>
        <label for="id">Numéro du ticket</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="commentaire" id="commentaire" maxlength="50">
        <label for="commentaire">Commentaire sur l'avancée</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Avancement" id="avancementcode">
        <label for="avancement">code de fin du ticket</label>
        <div id="textehistocode"> Laisser le code de fin vide si le ticket n'est pas terminé ou mettre TRM pour indiquer qu'il est terminé</div>
    </div>
    <!-- <div class="form-floating mb-3">
        <input type="text" class="form-control" name="" id="" >
        <label for=""></label>
    </div> -->
    <input type="hidden" name="action" value="formulairehistoval" id="action">
    <input type="submit" value="Valider" class="btn btn-success">

</form>
<br>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_SESSION["idticket"] ?>" method="post" class="histoval">
    <input type="submit" value="annuler" class="btn btn-danger">
</form>
<br>

<?php $contenu = ob_get_clean();


require "../vues/gabarit.php"

?>