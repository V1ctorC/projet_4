<?php $title = "S'inscrire"; ?>

<?php ob_start(); ?>
<h1>Créer un nouveau compte</h1>

<form action="" method="post">
    <div>
        <label for="mail">Adresse e-mail</label><br />
        <input type="email" name="mail" id="mail">
    </div>
    <div>
        <label for="pseudo">Pseudo</label><br />
        <input type="text" name="pseudo" id="pseudo">
    </div>
    <div>
    	<label for="password">Mot de passe</label><br />
    	<input type="password" name="password" id="password">
    </div>
    <div>
        <label for="passwordConfirm">Mot de passe (confirmation)</label><br />
        <input type="password" name="passwordConfirm" id="passwordConfirm">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>