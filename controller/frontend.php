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

function comment()
{
	$commentManager = new CommentManager;

	$commentA = $commentManager->getComment($_GET['comment_id']);

	require('view/frontend/editComment.php');
}

function create($mail, $pseudo, $password)
{
	$userManager = new UserManager;

	$affectedLines = $userManager->createUser($mail, $pseudo, $password);

	if ($affectedLines === false) {
		throw new Exception("Impossible de vous inscrire");
		
	} else {
		header('Location : index.php');
	}


	require ('view/frontend/registration.php');
}

function connect($mail, $password)
{
	$userManager = new UserManager;

	$log = $userManager->connectUser($mail, $password);

	if (!$log) {
		throw new Exception("Identifiant ou mot de passe incorrect");
		
	} else {
		session_start();
    	$_SESSION['user_id'] = $log['user_id'];
    	$_SESSION['user_name'] = $log['user_name'];
    	setcookie('pseudo', $log['user_name'], time() + 365*24*3600, null, null, false, true);

		header('Location: index.php');
	}

	require ('view/frontend/connect.php');
}

function disconnect()
{
	setcookie('pseudo', '');

	header('Location: index.php');

}