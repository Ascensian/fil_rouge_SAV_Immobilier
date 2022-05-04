<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title><?= $titre ?></title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../css/dashboard.css" rel="stylesheet">
  <link href="../css/ticket.css" rel="stylesheet">
</head>

<body>
  <balise id="hautDePage"></balise>
  <!-- NAVBAR  -->

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
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
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
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
              <a class="nav-link active" id="dashboard" aria-current="page" href="../index.php?action=dashboard">

                <span data-feather="home"></span>
                Tableau de bord
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php?action=commande">
                <span data-feather="file"></span>
                Commandes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php?action=ticket">
                <span data-feather="shopping-cart"></span>
                Ticket SAV
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php?action=client">

                <span data-feather="users"></span>
                Client
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php?action=article">
                <span data-feather="bar-chart-2"></span>
                Article
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="contenu">
        <?= $contenu ?>
        <a href="#hautDePage">Haut de page</a>
      </div>
      <!-- FOOTER  -->

      <script src="../Js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="../Js/dashboard.js"></script>
</body>

</html>