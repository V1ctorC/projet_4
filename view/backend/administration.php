<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<h1>Administration du Blog</h1>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
