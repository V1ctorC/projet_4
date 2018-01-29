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

function delete($postId)
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
        $comment = $commentManager->deleteComment($postId);
        header('Location: index.php?action=admin');
    }
	require('view/backend/administration.php');
}