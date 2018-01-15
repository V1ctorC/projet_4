<?php

function getPosts() 
{

	$db = dbConnect();
	$req = $db->query('SELECT post_id, post_title, post_content, post_dateAdd FROM posts ORDER BY post_dateAdd DESC LIMIT 0, 5');

	return $req;
}

function getPost($postId)
{

	$db = dbConnect();
	$req = $db->query('SELECT post_id, post_title, post_content, post_dateAdd FROM posts WHERE id = ?');
	$req->execute(array($postId));
	$post = $req->fetch();

	return $post;
}