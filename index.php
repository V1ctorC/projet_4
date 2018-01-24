<?php
require('controller/frontend.php');
require('controller/backend.php');

try{
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception("Erreur : aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception("Erreur : tous les champs ne sont pas remplis !");

                }
            }
            else {
                throw new Exception("Erreur : aucun identifiant de billet envoyé");

            }
        }
        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                comment();
            }
            else {
                throw new Exception("Erreur : identifiant commentaire inconnu");
                
            }
        }
        elseif ($_GET['action'] == 'edit') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
               
                if (!empty($_POST['newComment'])) {
                    edit($_POST['newComment'], $_GET['comment_id']);
                }
                else {
                    throw new Exception("Le champs n'est pas remplis");                   
                }
            }
            else {
                throw new Exception("Erreur : Identifiant du commentaire non valide");           
            }
        }
        elseif ($_GET['action'] == 'create') {
            if (!empty($_POST['mail']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['verifPassword'])) {
                create($_POST['mail'], $_POST['pseudo'], $_POST['password'], $_POST['verifPassword']);
            }
            else {
                throw new Exception("Tous les champs ne sont pas remplis");
                
            }
        }
        elseif ($_GET['action'] == 'connect'){
            if (!empty($_POST['mail']) && !empty($_POST['password'])) {
                connect($_POST['mail'], $_POST['password']);
            }
            else {
                throw new Exception("Tous les champs ne sont pas remplis");
                
            }
        }
        elseif ($_GET['action'] == 'disconnect'){
            if (isset($_COOKIE['pseudo'])) {
                disconnect();
            }
            else {
                throw new Exception("Vous n'êtes pas connecté");          
            }
        }
    }
    else {
        listPosts();
    }
}

catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}