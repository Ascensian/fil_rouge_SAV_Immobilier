<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});

$titre = "Ticket";

ob_start();
// var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];

?>


<br>
<h2 class="title">Tickets SAV</h2>
<!-- <br>
<form action="ticketController.php" method="post">
    <input type="hidden" name="action" value="formulaireNVTicket">
    <input type="submit" class="btn btn-success" value="Nouveau ticket">
</form> -->
<br>
<?php if ($action == "ticket" or isset($_GET["libTicket"])) {

?>
    <table class="table table-bordered table-striped " id="tableTicket">
        <thead>
            <tr class="bg-primary">
                <th scope="col">Numéro de ticket</th>
                <th scope="col">Date de création</th>
                <th scope="col">Numéro de commande</th>
                <th scope="col">Article concerné</th>
                <th scope="col">Code lié à la commande ou à l'article </th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($ticket as $key => $infoticket) { ?>
                <tr>
                    <th scope="row"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $infoticket["IdTicketSAV"] ?>&action=detailsTicket"><?= $infoticket["IdTicketSAV"] ?></a></th>
                    <td><?= $infoticket["DateTicketSAV"] ?></td>
                    <td><?= $infoticket["IdCommande"] ?></td>
                    <td><?php
                        if ($infoticket["IdArticle"] == NULL) {
                            echo "La commande est concernée";
                        } else {
                            echo $infoticket["IdArticle"];
                        } ?></td>
                    <td><?= $infoticket["CommentaireTicketSAV"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else {
    // $ticket = getTickets($action);
?>
    <table class="table table-bordered table-striped " id="tableTicketDetail">
        <thead>
            <tr class="bg-primary">
                <th scope="col">Numéro de ticket</th>
                <th scope="col">
                    <?php if ($action == "article") {
                        echo "Article concernée";
                    } else if ($action == "date") {
                        echo "Date de création du ticket";
                    } else {
                        echo "Code lié à la commande ou à l'article";
                    }
                    ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($ticket as $key => $infoticket) { ?>
                <tr>
                    <th scope="row"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $infoticket["IdTicketSAV"] ?>&action=detailsTicket"><?= $infoticket["IdTicketSAV"] ?></a></th>
                    <td><?php
                        if ($action == "article") {
                            if ($infoticket["IdArticle"] == NULL) {
                                echo "La commande est concernée";
                            } else {
                                echo $infoticket["IdArticle"];
                            }
                        } else if ($action == "date") {
                            echo $infoticket["DateTicketSAV"];
                        } else {
                            echo $infoticket["CommentaireTicketSAV"];
                        }
                        ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<h2 class="title">Trier par type : <?= $action ?></h2>
<div id="ticketbtn">
    <?php if ($action != "ticket") {
    ?><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="btntri">
            <input type="hidden" name="action" value="ticket">
            <input class="btn btn-primary" type="submit" value="ticket">
        </form>
    <?php }
    if ($action != "article") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="btntri">
            <input type="hidden" name="action" value="article">
            <input class="btn btn-primary" type="submit" value="article">
        </form>
    <?php }
    if ($action != "date") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="btntri">
            <input type="hidden" name="action" value="date">
            <input class="btn btn-primary" type="submit" value="date">
        </form>
    <?php }
    if ($action != "code") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="btntri">
            <input type="hidden" name="action" value="code">
            <input class="btn btn-primary" type="submit" value="code">
        </form>
    <?php } ?>
</div>


<?php $contenu = ob_get_clean();


require "../fil_rouge_SAV_Immobilier/vues/gabarit.php";


?>