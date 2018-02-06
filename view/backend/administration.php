<?php $title = "Administration"; ?>

<?php ob_start(); ?>
<h2>Administration du Blog</h2>

<div id="content">
    <div id="posts">
        <div id="addArticle">
            <form action="index.php?action=addPost" method="post">
            <div>
                <label for="title">Titre</label><br />
                <input type="text" id="title" name="title" class="fields" />
                </div>
            <div>
                <label for="chapter">Contenu</label><br />
                <textarea id="chapter" name="chapter"></textarea>
            </div>
            <div>
                <input type="submit" class="submit" />
            </div>
            </form>
        </div>
        
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($data['post_title']) ?>
                </h3>
        
                <p>
                    <?= nl2br($data['post_content']) ?>
                    <br />
                    <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                    <em><a href="index.php?action=postAlone&amp;id=<?= $data['id'] ?>">Editer</a></em>
                    <em><a href="index.php?action=delete&amp;id=<?= $data['id'] ?>">Supprimer</a></em> <br />
                    <em id="dateAdmin"><?= $data['post_dateAddFormat'] ?></em>
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
