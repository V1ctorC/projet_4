<?php $title = "Modifier un commentaire"; ?>

<?php ob_start(); ?>

<h2>Editer un commentaire</h2>
<p><a href="index.php">Retour à la liste des billets</a></p>


<p><strong>Le commentaire actuel est : </strong><?= htmlspecialchars($commentA['comment_content']) ?> </p>


<h3>Vous souhaitez le modifier par :</h3>


<form action="index.php?action=edit&amp;comment_id=<?= $commentA['comment_id'] ?>" method="post">
    <div>
        <label for="comment">Modifier le commentaire</label><br />
        <textarea id="comment" name="newComment"><?= htmlspecialchars($commentA['comment_content']) ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
