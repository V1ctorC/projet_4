<?php $title = "Se connecter"; ?>

<?php ob_start(); ?>
<h1>Se connecter à son compte</h1>


<form action="../../index.php?action=connect" method="post">
    <div>
        <label for="mail">Adresse e-mail</label><br />
        <input type="email" name="mail" id="mail">
    </div>
    <div>
    	<label for="password">Mot de passe</label><br />
    	<input type="password" name="password" id="password">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
