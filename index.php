<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<?php
session_start();
?>
<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg bg-dark text-light">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="index.php?page=default">Ma Boutique</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ">
            <a class="nav-link text-light" aria-current="page" href="index.php?page=categorie&action=list">Categories</a>
            <?php
            if(!empty($_SESSION) && $_SESSION['admin'] == true){
                ?><a class="nav-link text-light" aria-current="page" href="?page=user&action=list">Administration</a><?php
            }
            if(!empty($_SESSION) && $_SESSION['active'] == true){
                ?><a class="nav-link text-light" href="?page=disconnect">Déconnexion</a><?php
            }?>
        </div>
        </div>
    </div>
    </nav>
    <div class='container-fluid'>
        <?php
        require_once 'class/autoload.php';
        Autoload::load();
            if(!empty($_SESSION['active']) && $_SESSION['active'] == true)
            {
                if(isset($_GET['page'])){
                    switch ($_GET['page']) {
                        case 'categorie':
                            $ctrl = new CategorieController();
                            if(!empty($_GET['action']))
                            {
                                switch($_GET['action']){
                                    case 'list':
                                        echo $ctrl-> getCategories();
                                        break;
                                    case 'add':
                                        if($_SESSION['admin']){
                                            if(!empty($_POST)){
                                                if($ctrl->saveCategorie($_POST)){
                                                    header('location:index.php?page=categorie&action=list');
                                                }else{
                                                    echo '<p>add error</p>';
                                                }
                                            }
                                            echo $ctrl->createCategorie();
                                        }else{
                                            echo "<div class='alert alert-danger m-auto text-center'><h2>Accès non autorisé</h2></div>";
                                        }
                                        break;
                                    case 'update':
                                        if($_SESSION['admin']){
                                            if(!empty($_POST)){
                                                if($ctrl->updateCategorie($_POST,$_GET['categorie'])){
                                                    header('location:index.php?page=categorie&action=list');
                                                }else{
                                                    echo '<p>update: error</p>';
                                                }
                                            }
                                            if(!empty($_GET['categorie'])){
                                                echo $ctrl->modifCategorie($_GET['categorie']);
                                            }
                                        }else{
                                            echo "<div class='alert alert-danger m-auto text-center'><h2>Accès non autorisé</h2></div>";
                                        }
                                        break;
                                    case 'delete':
                                        if($_SESSION['admin']){
                                            if(!empty($_GET['categorie'])){
                                                if($ctrl->deleteCategorie($_GET['categorie'])){
                                                    header('location:index.php?page=categorie&action=list');
                                                }else{
                                                    echo "<p>Erreur lors de la suppression</p>";
                                                }
                                            }
                                        }else{
                                            echo "<div class='alert alert-danger m-auto text-center'><h2>Accès non autorisé</h2></div>";
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            }else{
                                echo "<p>No action given</p>";
                            }
                            break;
                        case 'produit':
                            $ctrl = new ProduitController();
                            switch($_GET['action']){
                                case 'list':
                                    break;
                                case 'list_by_categorie':
                                    if(!empty($_GET['categorie'])){
                                        echo $ctrl->getProduitByCategorie($_GET['categorie']);
                                    }
                                    break;
                                
                                case 'add':
                                    if($_SESSION['admin']){
                                        if(!empty($_POST)){
                                            if($ctrl->saveProduit($_POST)){
                                                
                                                header('location:index.php?page=produit&action=list_by_categorie&categorie='.$_POST['categorie']);
                                            }else{
                                                echo '<p>add error</p>';
                                            }
                                        }
                                        
                                        echo $ctrl->createProduit();
                                    }else{
                                        echo "<div class='alert alert-danger m-auto text-center'><h2>Accès non autorisé</h2></div>";
                                    }
                                    break;
                                case 'update':
                                    
                                    if($_SESSION['admin']){
                                        if(!empty($_POST)){
                                            if($ctrl->updateProduit($_POST,$_GET['produit'])){
                                                header('location:index.php?page=produit&action=list_by_categorie&categorie='.$_POST['categorie']);
                                            }else{
                                                echo '<p>update: error</p>';
                                            }
                                        }
                                        if(!empty($_GET['produit'])){
                                            echo $ctrl->modifProduit($_GET['produit']);
                                        }
                                    }else{
                                        echo "<div class='alert alert-danger m-auto text-center'><h2>Accès non autorisé</h2></div>";
                                    }
                                    break;
                                case 'delete':
                                    if($_SESSION['admin']){
                                        if(!empty($_GET['produit'])){
                                            if($ctrl->deleteProduit($_GET['produit'])){
                                                header('location:index.php?page=produit&action=list_by_categorie&categorie='.$_GET['categorie']);
                                            }else{
                                                echo "<p>Erreur lors de la suppression</p>";
                                            }
                                        }
                                    }else{
                                        echo "<div class='alert alert-danger m-auto text-center'><h2>Accès non autorisé</h2></div>";
                                    }
                                    break;
                                default:
                                    break;
                    
                            }
                            break;
                        case 'user':
                            
                            if($_SESSION['admin'] == true){
                                $ctrl = new UserController();
                                if(!empty($_GET['action'])){
                                    switch($_GET['action']){
                                        case 'list':
                                            echo $ctrl->getUsers();
                                            break;
                                        case 'add':
                                            if(!empty($_POST)){
                                                if($ctrl->saveUser($_POST)){
                                                    header('location:index.php?page=user&action=list');
                                                }else{
                                                    echo '<p>add error</p>';
                                                }
                                            }
                                            echo $ctrl->createUser();
                                            break;
                                        case 'update':
                                            if(!empty($_POST)){
                                                if($ctrl->updateUser($_POST,$_GET['user'])){
                                                    header('location:index.php?page=user&action=list');
                                                }else{
                                                    echo '<p>update: error</p>';
                                                }
                                            }
                                            if(!empty($_GET['user'])){
                                                echo $ctrl->modifUser($_GET['user']);
                                            }
                                            break;
                                        case 'delete':
                                            if(!empty($_GET['user'])){
                                                if($ctrl->deleteUser($_GET['user'])){
                                                    header('location:index.php?page=user&action=list');
                                                }else{
                                                    echo "<p>Erreur lors de la suppression</p>";
                                                }
                                            }
                                            break;
                                        default:
                                            break;
                                    }
                                }
                            }else{
                                echo "<p>Accès non autorisé</p>";
                            }
                            
                            break;
                        case 'disconnect':
                            $ctrl = new UserController();
                            $ctrl->disconnectUser();
                            header('location:index.php');
                            break;
                        default:
                            echo "<h2 class='text-align-center text-light'>Accueil</h2>";
                            break;
                    }
                }else{
                    // 404
                    echo '<p>Erreur 404 : Page Not Found</p>';
                }
            }else{
                $ctrl = new UserController();
                if(!empty($_POST['submit'])){
                    if($ctrl->verifyConnection($_POST) === true){
                        header('location:index.php?page=default');
                    }else{
                        echo "<p>Erreur lors de la connection</p>";
                    }
                }else if(!empty($_POST['register'])){
                    if($ctrl->saveUser($_POST) === true){
                        if($ctrl->verifyConnection($_POST) === true){
                            header('location:index.php?page=default&register=success');
                        }
                        
                    }else{
                        echo "<p>Erreur lors d'inscription'</p>";
                    }
                }
                if(!empty($_GET['action']) && $_GET['action'] == 'register'){
                    echo $ctrl->createUser();
                }else{
                    echo $ctrl->loginForm();
                }
            }
        ?>
    </div>
</body>
<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</footer>
</html>