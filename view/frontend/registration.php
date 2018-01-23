<?php $title = "S'inscrire"; ?>

<?php ob_start(); ?>
<h1>Créer un nouveau compte</h1>

<form action="../../index.php?action=create" method="post">
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
        <label for="verifPassword">Mot de passe (confirmation)</label><br />
        <input type="password" name="verifPassword" id="verifPassword">
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>