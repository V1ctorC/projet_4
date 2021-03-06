<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new PostManager;
    $posts = $postManager->getPosts();
    require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new PostManager;
	$commentManager = new CommentManager;

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}


function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager;

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception("Impossible d\'ajouter le commentaire !");
        
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }

    require('view/frontend/editComment.php');
}

function edit($newComment, $commentId)
{
	$commentManager = new CommentManager;

	$affectedLines = $commentManager->editComment($newComment, $commentId);

	if ($affectedLines === false) {
		throw new Exception("Impossible de modifier le commentaire");
		
	}
	else {
		header('Location: index.php');
	}

	require('view/frontend/editComment.php');
}



function create($mail, $pseudo, $password, $verifPassword)
{
	if (isset($mail))
	{
	    $mail = htmlspecialchars($mail);

	    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
	    {
	       $userManager = new UserManager;
	       $verif = $userManager->verifPseudo($pseudo);

	       if ($verif === false) {

		       	$verif = $userManager->verifMail($mail);

		       	if ($verif === false) {

		       		if ($password === $verifPassword) {

		       			$password = password_hash($password, PASSWORD_DEFAULT);

			       		$affectedLines = $userManager->createUser($mail, $pseudo, $password);

						if ($affectedLines === false) {
							throw new Exception("Impossible de vous inscrire");
							
						} else {
							header('Location: index.php');
						}
		       		
		       		} else {
		       			throw new Exception("Les mots de passe ne sont pas identiques");
		       			
		       		}
		       			
		       	} else {
		       		throw new Exception("Vous possedez déjà un compte utilisateur");
		       		
		       	}

	       } else {
	       	throw new Exception("Votre pseudo est déjà utilisé");
	       	
	       }
			
	    }
	    else
	    {
	        throw new Exception( "L'adresse " . $mail . " n'est pas valide, recommencez !");
	    }
	}


	require ('view/frontend/registration.php');
}


function registration()
{
	require ('view/frontend/registration.php');
}

function connectPage()
{
	require ('view/frontend/connect.php');
}

function connect($mail, $password)
{
	$userManager = new UserManager;

	$hash = $userManager->hashPassword($mail);
	$secure = $hash['user_password'];
	if (isset($secure)) {
		if (password_verify($password, $secure)) {
	    	$_SESSION['user_id'] = $hash['user_id'];
	    	$_SESSION['user_name'] = $hash['user_name'];
	    	$_SESSION['user_access'] = $hash['user_access'];

			header('Location: index.php');
	 	} else {
	 		throw new Exception("Mot de passe incorrect");
	 	
		};
	} else {
		throw new Exception("L'adresse " . $mail . " n'a pas de compte");
		
	}

	require ('view/frontend/connect.php');
	
}

function disconnect()
{
	session_destroy();

	header('Location: index.php');

}