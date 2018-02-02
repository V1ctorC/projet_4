<!DOCTYPE html>
<html>
    <head>
        <!--<meta charset="utf-8" /> -->
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<a href="http://localhost:8888/Projet/projet_4/index.php">Acceuil</a> <br />
        
        <?php
        if (isset($_SESSION['user_name'])) {
            echo 'Bonjour ' . $_SESSION['user_name']; ?>
            <br /> <a href="index.php?action=disconnect">Deconnexion</a> <?php

        } else { ?>
            <a href="http://localhost:8888/Projet/projet_4/view/frontend/registration.php">S'inscrire</a> <br />
            <a href="http://localhost:8888/Projet/projet_4/view/frontend/connect.php">Connexion</a>
        <?php }
        echo $content ?>

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