<?php
    
?>
<form method='POST' action=''>
    <div class="mb-3">
        <label for="name" class="form-label text-light">Nom:</label>
        <input type=text  class="form-control" name="name" value="<?=($_GET['action'] == 'update' && !empty($user['nom'])) ? $user['nom'] : '' ;?>">
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label text-light">Adresse mail:</label>
        <input name="mail" class="form-control" value=<?= ($_GET['action'] == 'update' && !empty($user['mail'])) ? $user['mail'] : '';?>>
    </div>
    <?php
    if(empty($user)){
        ?>
        <div class="mb-3">
            <label for="mdp" class="form-label text-light">Mot de passe:</label><input type=password name="mdp" class="form-control">
        </div>
        <?php
    }else{
        ?><input type=hidden name="mdp" value="none"><?php
    }
    if($_GET['action'] == 'update' && !empty($user['id'])){
        ?>
        <input type=hidden name="user" value='<?=$user['id'];?>'>
        <?php
    }
    if(!empty($_SESSION) && $_SESSION['admin'] === true){
        ?>
        <div class="mb-3">
            <label for=statut class="form-label text-light">Statut :</label>
            <select name='statut' class='form-control'>
                <option value=1 <?= (!empty($user) && $user['statut'] == true)? "selected":"" ;?>>Administrateur</option>
                <option value=0 <?= (!empty($user) && $user['statut'] == false)? "selected":"" ;?>>Utilisateur</option>
            </select>
        </div>
            <?php
    }
    ?>
    <input type="submit" class="btn btn-success" name=register value='Valider'>
</form>
