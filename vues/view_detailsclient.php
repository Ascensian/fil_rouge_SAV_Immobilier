<?php



$titre = "Details";
// $client = ClientMgr::getClient($_SESSION["userRole"],  $_SESSION["mdpRole"], $_GET['id']);
// $tabcom = ClientMgr::getCommande($_SESSION["userRole"],  $_SESSION["mdpRole"], $_GET['id']);
-ob_start();
echo $msg ?>

<!-- <h1><?php echo $titre1 ?></h1> -->
<div id="contenudetailclient" class="contenu grid-container">

    <div id="grandediv">
        <form id="formclient" action="controlerclient.php" method="GET">
            <fieldset id="formulaireclient">
                <h1 id="detail">Détail Client</h1>
                <div id="detailclient" class="col-7">
                    <div class="row g-3">
                        <div class="col">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" value="<?php echo $client[0]['NomClient'] ?>" aria-label="First name" name="nom" disabled>
                        </div>
                        <div class="col">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" value="<?php echo $client[0]['PrenomClient'] ?>" aria-label="Last name" name='prenom' disabled>
                        </div>
                    </div>
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="inputEmail" value="<?php echo $client[0]['Email'] ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Adresse</label>
                            <input type="text" class="form-control" name="inputAddress" value="<?php echo $client[0]['AdresseClient'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Ville</label>
                            <input type="text" class="form-control" value="<?php echo $client[0]['VilleClient'] ?>" name="inputCity" required>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" value="<?php echo $client[0]['CPClient'] ?>" maxlength="5" minlength="5" name="inputZip" required>
                        </div>
                </div>
                <br>
                <div class="col-12">
                    <input type="hidden" name="action" value="modif"></input>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <input type="submit" class="btn btn-primary" value="Modifier"></input>
                </div>
        </form>
        </form>
        </fieldset>

    </div>

    <div id="petitediv1">
        <table id="tabcom" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID commande</th>
                    <th scope="col">Etat Commande</th>
                    <th scope="col">Date de commande</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tabcom as $key => $value) {
                ?><tr onclick="document.location.href='<?php echo $_SERVER['PHP_SELF'] ?>?CMD=<?php echo $value['IdCommande'] ?>&id=<?php echo $_GET['id'] ?>&action=detailcomm'">
                        <th scope="row"><?php echo $value["IdCommande"] ?></th>
                        <td><?php echo $value["EtatCommande"] ?></td>
                        <td><?php echo $value["DateCommande"] ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>




        <?php $contenu = ob_get_clean();

        require "../vues/gabarit.php";



        ?>