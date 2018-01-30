<?php $title = "Moderation commentaires"; ?>

<?php ob_start(); ?>
<h1>Modération des commentaires</h1>

<div id="content">
    
    <div id="comments">
        <h2>comments</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <div class="comment">
                <h3>
                    <em>le <?= $comment['comment_date'] ?></em>
                </h3>
                
                <p>
                    <?= nl2br(htmlspecialchars($comment['comment_content'])) ?> <br />
                
                </p>
                <p>Nombre de signalement : <?= $comment['comment_report'] ?></p>
                <em><a href="index.php?action=deleteComment&amp;comment_id=<?= $comment['comment_id'] ?>">Supprimer</a></em>
            </div>
        <?php
        }
        $comments->closeCursor();
        ?>
    
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>