<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Connexion</title>
</head>
<header>

</header>

<body>

    <section>
        <div class="row" id="head"></div>
        <div class="container" id="test">
            <div class="row d-flex align-items-center justify-content-center ">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="images/Menuiz Man.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="../index.php" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="identifiant">Identifiant</label>
                            <input type="text" name="identifiant" id="identifiant" class="form-control form-control-lg" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="mdp">Mot de passe</label>
                            <input type="password" name="mdp" id="mdp" class="form-control form-control-lg" />
                        </div>

                        <!-- Submit button -->
                        <div class="row">
                            <input type="hidden" name="seconnecter" value="1">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="action" id="dashboard" value="connexionval">Connexion</button>
                        </div>
                    </form>
                    <div id="divmsgErreur">
                        <?php echo $msgErreur ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="footer"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>