<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<a href="http://localhost:8888/Projet/projet_4/index.php">Acceuil</a> <br />
        <a href="http://localhost:8888/Projet/projet_4/view/frontend/registration.php">S'inscrire</a> <br />
        <?php
        if (isset($_COOKIE['pseudo'])) {
            echo 'Bonjour ' . $_COOKIE['pseudo']; ?>
            <br /> <a href="index.php?action=disconnect">Deconnexion</a> <?php

        } else { ?>
             <a href="http://localhost:8888/Projet/projet_4/view/frontend/connect.php">Connexion</a>
        <?php }
        echo $content ?>

        <footer>
            <a href="index.php?action=admin">Administration du site</a>
        </footer>
    </body>
</html>