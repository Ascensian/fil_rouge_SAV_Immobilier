<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title><?= $titre ?></title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <?php echo '<link href="../css/ticket.css" rel="stylesheet">';
  echo '<link href="../css/dashboard.css" rel="stylesheet">';
  ?>

  <link rel="stylesheet" href="styleRecherche.css.css">
</head>

<body>

  <balise id="hautDePage"></balise>
  <!-- NAVBAR  -->

  <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <img src="../images/Menuiz Man.png" id="img1" alt="">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="btn-group">
      <button type="button" class="btn btn-primary" href="" id="selection"></button>
      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="btnselect" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
        <li><button class="dropdown-item btn1" type="button">Article</button></li>
        <li><button class="dropdown-item btn1" type="button">Pièce</button></li>
        <li><button class="dropdown-item btn1" type="button">Commande</button></li>
        <li><button class="dropdown-item btn1" type="button">Ticket</button></li>
        <li><button class="dropdown-item btn1" type="button">Client</button></li>
      </ul>
    </div>

  <!-- SEARCH FIELD  -->
    <form action="../controller/rechercheController.php" method="post">
      <input type="text" name="valeurRecherche">
      <button type="submit" name="action" value="query">GO</button>
    </form>

    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></a>
      </div>
    </div>

  </header>

  <!-- SIDEBAR -->

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" id="dashboard" aria-current="page" href="<?php
                                                                                  if ($_SESSION["index"] == 1) {
                                                                                    echo "index.php";
                                                                                  } else {
                                                                                    echo "../index.php";
                                                                                  } ?>?action=dashboard">

                <span data-feather="home"></span>
                Tableau de bord
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php
                                        if ($_SESSION["index"] == 1) {
                                          echo "index.php";
                                        } else {
                                          echo "../index.php";
                                        } ?>?action=commande">
                <span data-feather="file"></span>
                Commandes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php
                                        if ($_SESSION["index"] == 1) {
                                          echo "index.php";
                                        } else {
                                          echo "../index.php";
                                        } ?>?action=ticket">
                <span data-feather="shopping-cart"></span>
                Ticket SAV
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php
                                        if ($_SESSION["index"] == 1) {
                                          echo "index.php";
                                        } else {
                                          echo "../index.php";
                                        } ?>?action=client">

                <span data-feather="users"></span>
                Client
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php
                                        if ($_SESSION["index"] == 1) {
                                          echo "index.php";
                                        } else {
                                          echo "../index.php";
                                        } ?>?action=article">
                <span data-feather="bar-chart-2"></span>
                Article
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="<?php
                                        if ($_SESSION["index"] == 1) {
                                          echo "index.php";
                                        } else {
                                          echo "../index.php";
                                        } ?>?action=recherche">
                <span data-feather="bar-chart-2"></span>
                Recherche personnalisée
              </a>
            </li>


          </ul>
        </div>
      </nav>
      <div class="contenu">
        <?= $contenu ?>
        
      </div>
      <!-- FOOTER  -->

      <script src="../Js/dashboard.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
      <script src="../Js/dashboard.js"></script>
      <script src="../Js/ticket.js"></script>
</body>

</html>