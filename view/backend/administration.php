<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<h1>Administration du Blog</h1>

<div id="content">
    <div id="posts">
        <h2>posts</h2>
    </div>
    <div id="comments">
        <h2>comments</h2>
    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
