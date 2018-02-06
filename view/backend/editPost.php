<?php $title = "Modifier un chapitre"; ?>

<?php ob_start(); ?>
<h2>Editer un chapitre</h2>
<p><a href="index.php">Retour à la liste des chapitres</a></p>


<p><strong>Le chapitre actuel est : </strong></p>

<p>Titre : <?= htmlspecialchars($post['post_title']) ?> </p> <br />
<p>Contenu : <?= $post['post_content'] ?></p>


<h3>Vous souhaitez le modifier par :</h3>


<form action="index.php?action=editPost&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="newTitle">Titre</label><br />
        <input type="text" id="newTitle" name="newTitle" value="<?= ($post['post_title']) ?>" />
    </div>
    <div>
    <label for="chapter">Contenu</label><br />
        <textarea id="chapter" name="chapter"><?= ($post['post_content']) ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>