<?php
if(!empty($users)){
    ?>
    <a class="btn btn-success" href="?page=user&action=add">Ajouter un utilisateur</a>
    <table class="table table-dark table-striped w-100">
        <thead>
            <tr>
                <th>Nom</th>
                <th>mail</th>
                <th>Statut</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody><?php
    foreach( $users as $user){
        ?><tr>
            <td><p><?=$user['nom'];?></p></td>
            <td><p><?=$user['mail'];?></p></td>
            <td><p><?=($user['statut']) ? "admin" : "utilisateur";?></p></td>
            <td><a class="btn btn-warning" href="?page=user&action=update&user=<?=$user['id'];?>">Modifier</a></td>
            <td><a class="btn btn-danger" href="?page=user&action=delete&user=<?=$user['id'];?>">Supprimer</a></td>
        </tr><?php
    }
}