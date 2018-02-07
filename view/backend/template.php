<!DOCTYPE html>
<html>
    <head>
    	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script src='public/js/script.js'></script>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/backend.css" rel="stylesheet" />
    </head>
        
    <body>
        <header>
            <h1>Billet simple pour l'Alaska <img src="public/images/ours.png" id="bear"></h1>
            <ul id="menu">
                    <li><a href="index.php">Acceuil</a></li>

                    <?php
                    if (isset($_SESSION['user_access'])) 
                    { 
                        $access = $_SESSION['user_access'];
                        if ($access === "admin") { ?>
                            <li><a href="index.php?action=moderationComment">Moderation des commentaires</a></li>
                            <li><a href="index.php?action=admin">Administration du site</a></li>
                        <?php } 
                    } ?>
                        <li><a href="index.php?action=disconnect">Deconnexion</a></li>

            </ul>
        </header>
        <?php echo $content ?>

        <footer>
            OpenClassrooms 2018 - Projet 4
        </footer>

    </body>
</html>