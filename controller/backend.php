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
	$postManager = new PostManager;
    $posts = $postManager->getPosts();
    require('view/backend/administration.php');
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