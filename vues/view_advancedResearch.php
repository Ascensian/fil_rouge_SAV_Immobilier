<?php

$titre = "coucou";

ob_start();
?>


    <h1>RECHERCHER PAR</h1>
    <div id="search_list">
        <div id="client">client</div>
        <div id="order">commande</div>
        <div id="ticket">ticket</div>
    </div>
    

    

<script src="/Js/affichageRecherche.js"></script>

<?php
$contenu = ob_get_clean();
require "../vues/gabarit.php";

