

<h2><?= $cat['nom'];?></h2>
<?= (!empty($_SESSION) && $_SESSION['admin'] === true) ? '<a class="btn btn-success" href="?page=produit&action=add&categorie='.$_GET["categorie"].'">Ajouter un produit</a>' : '';?>

<?php
if(!empty($produits)){
    ?>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantitée</th>
                <th>Btn</th>

            </tr>
        </thead>
        <tbody><?php
        foreach($produits as $produit)
        {
            ?>
            <tr>
            <td><p><?=$produit['nom'];?></p></td>
            <td><p><?=$produit['description'];?></p></td>
            <td><p><?=$produit['prix'];?></p></td>
            <td><p><?=$produit['quantite'];?></p></td>
            <td><div class="row p-1">
                <!-- <a class="btn btn-primary col-12 col-sm-12 col-lg-4" href="?page=produitaction=detail&produit=<?=$produit['id'];?>">Voir</a> -->
                <?php
                if(!empty($_SESSION) && $_SESSION['admin'] === true)
                {
                    ?>
                    <a class="btn btn-warning col-12 col-sm-6 col-lg-4" href="?page=produit&action=update&produit=<?=$produit['id'];?>">Modifier</a>
                    <a class="btn btn-danger col-12 col-sm-5 col-lg-4" href="?page=produit&action=delete&produit=<?=$produit['id'];?>&categorie=<?=$_GET['categorie'];?>">Supprimer</a>
                <?php
                }
                ?>
            </div></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}else{
    echo "<p>Il n'y a pas de produit associé a cette categorie</p>";
}