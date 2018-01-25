<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<h1>Administration du Blog</h1>

<p>Vous êtes sur la partie administration du blog</p>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
