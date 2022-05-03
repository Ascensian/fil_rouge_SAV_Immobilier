
<fieldset id="formulaireclient">
        <div id="detailclient" class="col-7">
            <div class="row g-3">
                <div class="col">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" value="<?php echo $client[0]['NomClient']?>" aria-label="First name" id="nom" disabled>
                </div>
                <div class="col">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" value="<?php echo $client[0]['PrenomClient']?>" aria-label="Last name" id='prenom' disabled>
                </div>
            </div>
                <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" value="<?php echo $client[0]['Email']?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="inputAddress" value="<?php echo $client[0]['AdresseClient']?>">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Ville</label>
                    <input type="text" class="form-control" value="<?php echo $client[0]['VilleClient']?>" id="inputCity">
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Code Postal</label>
                    <input type="text" class="form-control" value="<?php echo $client[0]['CPClient']?>" id="inputZip">
                </div>
            </div>
            <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
    </fieldset>


