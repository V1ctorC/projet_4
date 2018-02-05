<!DOCTYPE html>
<html>
    <head>
        <!--<meta charset="utf-8" /> -->
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div id="header">
            <h1>Billet simple pour l'Alaska</h1>
            <ul id="menu">
                <li><a href="http://localhost:8888/Projet/projet_4/index.php">Acceuil</a> <br /></li>

                <?php
                if (isset($_SESSION['user_name'])) { ?>
                    <li><p>"Bonjour "<?= htmlspecialchars($_SESSION['user_name'])?></p></li>
                    <li><br /> <a href="index.php?action=disconnect">Deconnexion</a></li> <?php

                } else { ?>
                    <li><a href="http://localhost:8888/Projet/projet_4/view/frontend/registration.php">S'inscrire</a></li>
                    <li><a href="http://localhost:8888/Projet/projet_4/view/frontend/connect.php">Connexion</a></li>
                <?php } ?> 
            </ul>  
        </div>
        
        <?= $content ?>

        <footer>

            <?php
            if (isset($_SESSION['user_access'])) 
            { 
                $footer = $_SESSION['user_access'];
                if ($footer === "admin") { ?>
                    <a href="index.php?action=admin">Administration du site</a>
                <?php }
                
            
             } ?>
        </footer>

        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script src='../../public/js/script.js'></script>
    </body>
</html>