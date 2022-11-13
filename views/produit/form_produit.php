<?php
    
?>
<form method='POST' action=''>
    <div class="mb-3">
        <label for="name" class="form-label text-light">Nom:</label>
        <input type=text class="form-control" name="name" value="<?=($_GET['action'] == 'update' && !empty($produit['nom'])) ? $produit['nom'] : '' ;?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label text-light">Description:</label>
        <textarea name="description" class="form-control"><?= ($_GET['action'] == 'update' && !empty($produit['description'])) ? $produit['description'] : '';?></textarea>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label text-light">Prix:</label>
        <input type=number class="form-control" name="prix" value=<?= ($_GET['action'] == 'update' && !empty($produit['prix'])) ? $produit['prix'] : '';?>>
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label text-light">Quantitée</label>
        <input type=number  class="form-control" name="quantite" value=<?= ($_GET['action'] == 'update' && !empty($produit['quantite'])) ? $produit['quantite'] : '';?>>
    </div>
        <input type=hidden name="categorie" value=<?=(!empty($produit['categorie'])) ? $produit['categorie'] : $_GET['categorie'];?>>

    <?php
    if($_GET['action'] == 'update' && !empty($produit['id'])){
        ?>
        <input type=hidden name="produit" value='<?=$produit['id'];?>'>
        <?php
    }
    ?>
    <input type="submit"  class="btn btn-success" name=submit value='Valider'>
</form>
