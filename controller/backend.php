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