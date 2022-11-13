<?php
    
?>
<form method='POST' action=''>
    <div class="mb-3">
        <label for="name" class="form-label text-light">Nom</label>
        <input name="name" class="form-control" value="<?=($_GET['action'] = 'update' && !empty($categorie['nom'])) ? $categorie['nom'] : '' ;?>">
    </div>
    <?php
    if($_GET['action'] == 'update' && !empty($categorie['id'])){
        ?>
        <input type=hidden value='<?=$categorie['id'];?>'>
        <?php
    }
    ?>
    <input type="submit" name=submit value='Valider'>
</form>
