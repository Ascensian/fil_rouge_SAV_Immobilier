<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
require "../classes/appelTicketMgr.php";
$titre = "Ticket";

ob_start(); ?>
<?php
// var_dump($_SESSION);
// echo $action;
// var_dump($_POST);
// var_dump($_GET);
// echo $_SERVER['PHP_SELF'];

?>

<h2 class="title">Trier par type</h2>
<div id="ticketbtn">
    <?php if ($action != "ticket") {
    ?><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input class="btn btn-primary" type="submit" value="ticket">
        </form>
    <?php }
    if ($action != "article") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input class="btn btn-primary" type="submit" value="article">
        </form>
    <?php }
    if ($action != "date") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input class="btn btn-primary" type="submit" value="date">
        </form>
    <?php }
    if ($action != "code") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input class="btn btn-primary" type="submit" value="code">
        </form>
    <?php } ?>
</div>
<h2 class="title">Tickets SAV</h2>
<?php if ($action == "ticket") {
    $ticket = getTickets();
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
                    <th scope="row"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id= <?php echo $infoticket["IdTicketSAV"] ?>"><?= $infoticket["IdTicketSAV"] ?></a></th>
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
} else if ($action == "article") {
    $ticket = ticketMgr::getTicketsOrderBy("root", "", "IdArticle");
?>
    <table class="table table-bordered table-striped " id="tableTicketDetail">
        <thead>
            <tr class="bg-primary">
                <th scope="col">Numéro de ticket</th>
                <th scope="col">Article concerné</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($ticket as $key => $infoticket) { ?>
                <tr>
                    <th scope="row"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id= <?php echo $infoticket["IdTicketSAV"] ?>"><?= $infoticket["IdTicketSAV"] ?></a></th>
                    <td><?php
                        if ($infoticket["IdArticle"] == NULL) {
                            echo "La commande est concernée";
                        } else {
                            echo $infoticket["IdArticle"];
                        } ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else if ($action == "date") {
    $ticket = ticketMgr::getTicketsOrderBy("root", "", "DateTicketSAV");
?>

    <table class="table table-bordered table-striped " id="tableTicketDetail">
        <thead>
            <tr class="bg-primary">
                <th scope="col">Numéro de ticket</th>
                <th scope="col">Date de création</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($ticket as $key => $infoticket) { ?>

                <tr>
                    <th scope="row"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id= <?php echo $infoticket["IdTicketSAV"] ?>"><?= $infoticket["IdTicketSAV"] ?></a></th>
                    <td><?= $infoticket["DateTicketSAV"] ?></td>
                </tr>


            <?php } ?>
        </tbody>
    </table>
<?php
} else if ($action == "code") { ?>
    <table class="table table-bordered table-striped table-hover" id="tableTicketCode">
        <thead>
            <tr class="bg-primary">
                <th scope="col">Numéro de ticket</th>
                <th scope="col">Code lié à la commande ou à l'article </th>

            </tr>
        </thead>
        <tbody>
            <?php
            $ticket = ticketMgr::getTicketsOrderBy("root", "", "CommentaireTicketSAV");
            // var_dump($ticket);
            foreach ($ticket as $key => $infoticket) { ?>
                <tr>

                    <th scope="row"><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id= <?php echo $infoticket["IdTicketSAV"] ?>"><?= $infoticket["IdTicketSAV"] ?></a></th>
                    <td><?= $infoticket["CommentaireTicketSAV"] ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }
?>


<?php $contenu = ob_get_clean();


require "../vues/gabaritcontroller.php"

?>