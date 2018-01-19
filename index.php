<?php
require('controller/frontend.php');

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
    }
    else {
        listPosts();
    }
}

catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}