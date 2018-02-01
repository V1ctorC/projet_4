<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function admin()
{
	require('view/backend/administration.php');	
}

function adminListPosts()
{
	if ($_SESSION['user_access'] == "admin") {
		exit();
	}
	$postManager = new PostManager;
    $posts = $postManager->getPosts();
    require('view/backend/administration.php');
}

function adminListComments()
{
	$commentManager = new CommentManager;
	$comments = $commentManager->getReportComment();
	require('view/backend/reportComment.php');
}

function add($title, $content)
{
	$postManager = new PostManager;
	$post = $postManager->addPost($title, $content);
	if ($post === false) {
        throw new Exception("Impossible d\'ajouter l'article !");    
    }
    else
    {
        header('Location: index.php?action=admin');
    }
	require('view/backend/administration.php');
}

function deletePost($postId)
{
	$postManager = new PostManager;
	$post = $postManager->deletePost($postId);

	if ($post === false)
	{
		throw new Exception("Impossible de supprimer l\'article");
	}
	else 
	{
        $commentManager = new CommentManager;
        $comment = $commentManager->deleteCommentPost($postId);
        header('Location: index.php?action=admin');
    }
	require('view/backend/administration.php');
}

function deleteComment($commentId)
{
	$commentManager = new CommentManager;
	$comment = $commentManager->deleteComment($commentId);

	if ($comment === false)
	{
		throw new Exception("Impossible de supprimer le commentaire");		
	}
	else
	{
		header('Location: index.php?action=admin');
	}
	
}

function postAlone($postId)
{
	$postManager = new PostManager;

    $post = $postManager->getPost($_GET['id']);

    require('view/backend/editPost.php');

}

function editPost($newTitle, $newContent, $postId)
{
	$postManager = new PostManager;
	$affectedLines = $postManager->editPost($newTitle, $newContent, $postId);

	if ($affectedLines === false) 
	{
		throw new Exception("Erreur : impossible de modifier l'article");
	}
	else
	{
		header('Location: index.php?action=admin');
	}

}

function reportComment($commentId)
{
	$commentManager = new CommentManager;
	$affectedLines = $commentManager->reportComment($commentId);

	if ($affectedLines === false) 
	{
		throw new Exception("Erreur : Signalement du commentaire impossible");
	}
	else
	{
		header('Location: index.php');
	}
}

function ignoreComment($commentId)
{
	$commentManager = new CommentManager;
	$affectedLines = $commentManager->ignoreComment($commentId);

	if ($affectedLines === false) 
	{
		throw new Exception("Erreur : Impossible d'ignorer le commentaire");
	}
	else
	{
		header('Location: index.php?action=admin');
	}
}