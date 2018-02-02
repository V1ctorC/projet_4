<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Derniers chapitres publiés :</p>



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
            <?= nl2br($data['post_content']) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>