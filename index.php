<?php
session_start();
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
        elseif ($_GET['action'] == 'addComment') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (isset($_SESSION['user_id'])) 
                {
                    if (!empty($_POST['comment'])) 
                    {
                        addComment($_GET['id'], $_SESSION['user_id'], $_POST['comment']);
                    }
                    else 
                    {
                        throw new Exception("Erreur : Le champs commentaire est vide");                 
                    }
                }                     
                else
                {
                    throw new Exception("Erreur : Vous n'êtes pas connecté");
                }
            }
            else 
            {
                throw new Exception("Erreur : aucun identifiant de billet envoyé");

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

        elseif ($_GET['action'] == 'registration') {
            registration();
        }

        elseif ($_GET['action'] == 'connectPage') {
            connectPage();
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
            if (isset($_SESSION['user_name'])) {
                disconnect();
            }
            else {
                throw new Exception("Vous n'êtes pas connecté");          
            }
        }

        //////////////////////////////
        //         ADMIN            //
        //////////////////////////////

        elseif ($_GET['action'] == 'admin')
        {
            access();
            adminListPosts();
        }

        elseif ($_GET['action'] == 'addPost')
        {
            if (!empty($_POST['title']) && !empty($_POST['chapter'])) 
            {
                access();
                add($_POST['title'], $_POST['chapter']);
            }
            else 
            {
                throw new Exception("Erreur : tous les champs ne sont pas remplis !");
            }
        }
        elseif ($_GET['action'] == 'delete')
        {
            if (isset($_GET['id']) && ($_GET['id'] > 0)) 
            {
                access();
                deletePost($_GET['id']);
            }
            else
            {
                throw new Exception("Erreur : identifiant billet inconnu");            
            }
        }
        elseif ($_GET['action'] == 'deleteComment')
        {
            if (isset($_GET['comment_id']) && ($_GET['comment_id'] > 0)) 
            {
                access();
                deleteComment($_GET['comment_id']);
            }
            else
            {
                throw new Exception("Erreur : L'identifiant du commentaire est incorrect");
                
            }
        }
        elseif ($_GET['action'] == 'postAlone')
        {
            if (isset($_GET['id']) && ($_GET['id'] > 0)) 
            {
                access();
                postAlone($_GET['id']);
            }   
            else
            {
                throw new Exception("Erreur : L'identifiant du billet est incorrect");
            }
        }
        elseif ($_GET['action'] == 'editPost')
        {
            if (isset($_GET['id']) && ($_GET['id'] > 0))
            {
                if (!empty($_POST['newTitle']) && !empty($_POST['chapter']))
                {
                    access();
                    editPost($_POST['newTitle'], $_POST['chapter'], $_GET['id']);
                }
                else
                {
                    throw new Exception("Erreur : Tous les champs ne sont pas remplis");
                    
                }
            }
            else
            {
                throw new Exception("Erreur : L'identifiant du billet est incorrect");
            }
        }
        elseif ($_GET['action'] == 'reportComment')
        {
            if (isset($_GET['comment_id']) && ($_GET['comment_id'] > 0)) 
            {
                //access();
                reportComment($_GET['comment_id']);
            }
            else
            {
                throw new Exception("Erreur : L'identifiant du commentaire est incorrect");
            }
        }
        elseif ($_GET['action'] == 'moderationComment')
        {
            access();
            adminListComments();
        }
        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                access();
                comment();
            }
            else {
                throw new Exception("Erreur : identifiant commentaire inconnu");
                
            }
        }
        elseif ($_GET['action'] == 'edit') {
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
               
                if (!empty($_POST['newComment'])) {
                    access();
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
        elseif ($_GET['action'] == 'ignoreComment')
            if (isset($_GET['comment_id']) && ($_GET['comment_id'] > 0)) 
            {
                access();
                ignoreComment($_GET['comment_id']);
            }
            else
            {
                throw new Exception("Erreur : L'indentifiant du commentaire est incorrect");
                
            }
    }
    else {
        listPosts();
    }
}

catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}