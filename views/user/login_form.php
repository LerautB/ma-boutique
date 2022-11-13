<?php
    if(empty($_SESSION['active'])){
        ?>
        <div class="w-100 m-auto">
            <form method=POST action="">
                <div class="mb-3 row">
                    <div class="col col-sm-6 col-md-8 col-lg-8 m-auto">
                        <label class="form-label text-light" for=mail>Adresse Mail:</label>
                        <input type=text class="form-control"  name=mail>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col col-sm-6 col-md-8 col-lg-8 m-auto">
                        <label class="form-label text-light" for=mdp>Mot de passe:</label>
                        <input type=password class="form-control"  name=mdp>
                    </div>
                </div>
                <div class="row">
                    <input class="btn btn-success col-5 m-auto" type=submit name=submit value=Connexion>
                    <a href="?action=register" class="col-5 m-auto btn btn-primary">Inscription</a>
                </div>
            </form>
        </div>
        
        <?php
    }