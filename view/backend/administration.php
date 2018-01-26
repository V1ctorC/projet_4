<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<h1>Administration du Blog</h1>

<div id="content">
    <div id="posts">
        <h2>posts</h2>
        <a href="index.php?action=add">Ajouter un article</a>
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['post_title']) ?>
                    <em>le <?= $data['post_dateAdd'] ?></em>
                </h3>
        
                <p>
                    <?= nl2br(htmlspecialchars($data['post_content'])) ?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </div>
    <div id="comments">
        <h2>comments</h2>
    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
