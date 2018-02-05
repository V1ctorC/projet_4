<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<p id="lastChapter">Derniers chapitres publiés :</p>



<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['post_title']) ?>
        </h3>
        
        <p>
            <?php
                $test = substr($data['post_content'], 0, 100);
                $test = $test . " ...";
                echo nl2br($test);
            ?>

            
        </p>
        <div id="info">
           <em>Posté le <?= $data['post_dateAdd'] ?></em>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em> 
        </div>
        
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>