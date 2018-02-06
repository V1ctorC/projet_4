<?php $title = "Moderation commentaires"; ?>

<?php ob_start(); ?>
<h2>Modération des commentaires</h2>

<div id="content">
    
    <div id="comments">

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
                <em><a href="index.php?action=ignoreComment&amp;comment_id=<?= $comment['comment_id'] ?>">Ignorer</a></em>
            </div>
        <?php
        }
        $comments->closeCursor();
        ?>
    
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>