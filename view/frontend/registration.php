<?php $title = "S'inscrire"; ?>

<?php ob_start(); ?>
<h2>Créer un nouveau compte</h2>

<form action="index.php?action=create" method="post">
    <div>
        <label for="mail">Adresse e-mail</label><br />
        <input type="email" name="mail" id="mail" class="fields">
    </div>
    <div>
        <label for="pseudo">Pseudo</label><br />
        <input type="text" name="pseudo" id="pseudo" class="fields">
    </div>
    <div>
    	<label for="password">Mot de passe</label><br />
    	<input type="password" name="password" id="password" class="fields" onfocus="Mot de passse">
    </div>
    <div>
        <label for="verifPassword">Mot de passe (confirmation)</label><br />
        <input type="password" name="verifPassword" id="verifPassword" class="fields">
    </div>
    <div>
        <input type="submit" class="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>