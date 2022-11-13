<?php
if(!empty($categories)){
    ?>
    <?= (!empty($_SESSION) && $_SESSION['admin'] === true) ? '<a class="btn btn-success" href="?page=categorie&action=add">Ajouter une Categorie</a>' : '';?>
    
    <table class="table table-dark table-striped w-100">
        <thead>
            <tr>
                <th>Nom</th>

                <th>Btn</th>
            </tr>
        </thead>
        <tbody><?php
    foreach( $categories as $cat){
        ?><tr>
            <td><h2><?=$cat['nom'];?></h2></td>
            <td class="p-1">
                <a class="btn btn-primary col-12 col-sm-12 col-lg-4" href="?page=produit&action=list_by_categorie&categorie=<?=$cat['id'];?>">Voir</a>
                <?php
                    if(!empty($_SESSION) && $_SESSION['admin'] === true)
                    {
                        ?>
                        <a class="btn btn-warning col-12 col-sm-6 col-lg-4" href="?page=categorie&action=update&categorie=<?=$cat['id'];?>">Modifier</a>
                        <a class="btn btn-danger col-12 col-sm-5 col-lg-4" href="?page=categorie&action=delete&categorie=<?=$cat['id'];?>">Supprimer</a>
                    <?php
                    }
                    ?>
            </td>
        </tr><?php
    }
}else{
    echo "<p>No categories found</p>";
}