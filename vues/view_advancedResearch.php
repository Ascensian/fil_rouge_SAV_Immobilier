<?php

$titre = "coucou";

ob_start();
?>


    <h1>RECHERCHER PAR</h1>
    <div id="search_list">
        <div id="client">client</div>
        <div id="order">commande</div>
        <div id="ticket">ticket</div>
        <div id="employe">employé</div>
    </div>


    



<?php
$contenu = ob_get_clean();
?>
<script src="/Js/controlForm.js" type="module"></script>
<?php require "../vues/gabarit.php"; ?>

