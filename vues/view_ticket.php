<?php
spl_autoload_register(function ($classe) {
    require "../classes/" . $classe . ".class.php";
});
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
    <?php if (!isset($_POST['action']) || $_POST['action'] == "ticket") {

    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="article">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="date">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="code">
        </form>
    <?php } else if ($_POST['action'] == "article") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input type="submit" value="ticket">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="date">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="code">
        </form>
    <?php } else if ($_POST['action'] == "date") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input type="submit" value="ticket">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="article">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="code">
            <input type="submit" value="code">
        </form>
    <?php } else if ($_POST['action'] == "code") { ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="ticket">
            <input type="submit" value="ticket">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="article">
            <input type="submit" value="article">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="action" value="date">
            <input type="submit" value="date">
        </form>
    <?php }
    ?>
</div>
<h2 class="title">Tickets SAV</h2>
<?php if (!isset($_POST['action']) || $_POST['action'] == "ticket") {
    $ticket = ticketMgr::getAllTickets("root", "");
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
} else if ($_POST['action'] == "article") {
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
} else if ($_POST['action'] == "date") {
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
} else if ($_POST['action'] == "code") { ?>
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


require "../vues/gabarit.php"

?>