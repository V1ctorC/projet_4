<?php $title = htmlspecialchars($post['post_title']); ?>

<?php ob_start(); ?>

<h2>Billet simple pour l'Alaska</h2>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['post_title']) ?>
    </h3>
    
    <p>
        <?= nl2br($post['post_content']) ?>
    </p>
    <div id="info">
        <em>le <?= $post['post_dateAddFormat'] ?></em>
    </div>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" class="submit" />
    </div>
</form>


<div id="listComment">
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <p><strong><?= $comment['user_pseudo'] ?></strong> le <?= $comment['comment_dateFormat'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
        <?php if (isset($_SESSION['user_access'])) 
                    { 
                        $access = $_SESSION['user_access'];
                        if ($access === "admin") { ?>
                            <a href="index.php?action=editComment&amp;comment_id=<?= $comment['comment_id'] ?>" class="adminButton">Modifier</a>
                            <a href="index.php?action=deleteComment&amp;comment_id=<?= $comment['comment_id'] ?>" class="adminButton">Supprimer</a>
                        <?php
                        } else { ?>
                            <a href="index.php?action=reportComment&amp;comment_id=<?= $comment['comment_id'] ?>" id="report">Signaler</a> <?php
                        }
                    } else { ?>
                            <a href="index.php?action=reportComment&amp;comment_id=<?= $comment['comment_id'] ?>" id="report">Signaler</a> <?php
                    }?>
        <hr>
    <?php
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
