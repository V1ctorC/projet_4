<?php $title = "Se connecter"; ?>

<?php ob_start(); ?>
<h2>Se connecter à son compte</h2>


<form action="index.php?action=connect" method="post">
    <div>
        <label for="mail">Adresse e-mail</label><br />
        <input type="email" name="mail" id="mail" class="fields">
    </div>
    <div>
    	<label for="password">Mot de passe</label><br />
    	<input type="password" name="password" id="password" class="fields">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
