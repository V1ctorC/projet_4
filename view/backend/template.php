<!DOCTYPE html>
<html>
    <head>
    	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		<script>
		tinymce.init({
		selector: '#chapter'
		});
		</script>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="../../public/css/backend.css" rel="stylesheet" />
    </head>
        
    <body>
    	<a href="http://localhost:8888/Projet/projet_4/index.php">Accueil</a> <br />

        <?php echo $content ?>

    </body>
</html>