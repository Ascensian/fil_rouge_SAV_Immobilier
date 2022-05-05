<?php

$titre = "Résultat(s) recherche";

ob_start();
?>
<div>
    <h4>Client(s) trouvé(s) : '' pour le terme ''</h4>
</div>

<div>
    <h4>Commande trouvée(s) : pour le terme </h4>
</div>

<div>
    <h4>Ticket trouvé(s) : pour le terme</h4>
</div>


<?php $contenu = ob_get_clean();?>


<?php require "../vues/gabarit.php"; ?>
