<?php $title = "Déconnexion"; ?>

<?php ob_start(); ?>
<h1>Se deconnecter</h1>

<?php 

// Suppression des cookies de connexion automatique
setcookie('pseudo', '');
?>

<p>Vous avez été deconnecté avec succès !</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>