<?php $title = htmlspecialchars($post['post_title']); ?>

<?php ob_start(); ?>

<h1>Billet simple pour l'Alaska</h1>
<p><a href="index.php">Retour à la liste des chapitres</a></p>

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
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong></strong> le <?= $comment['comment_date'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
    <em><a href="index.php?action=editComment&amp;comment_id=<?= $comment['comment_id'] ?>">Modifier</a></em>
    <em><a href="index.php?action=deleteComment&amp;comment_id=<?= $comment['comment_id'] ?>">Supprimer</a></em>
    <em><a href="index.php?action=reportComment&amp;comment_id=<?= $comment['comment_id'] ?>">Signaler</a></em>
    <hr>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
