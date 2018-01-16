<?php

function getPosts() 
{

	$db = dbConnect();
	$req = $db->query('SELECT id, post_title, post_content, DATE_FORMAT(post_dateAdd, \'%d/%m/%Y à %Hh%imin%ss\') AS post_dateAdd FROM posts ORDER BY post_dateAdd DESC LIMIT 0, 5');

	return $req;
}

function getPost($postId)
{

	$db = dbConnect();
	$req = $db->prepare('SELECT id, post_title, post_content, DATE_FORMAT(post_dateAdd, \'%d/%m/%Y à %Hh%imin%ss\') AS post_dateAdd FROM posts WHERE id = ?');
	$req->execute(array($postId));
	$post = $req->fetch();

	return $post;
}

function getComments($postId)
{

	$db = dbConnect();
	$req = $db->prepare('SELECT comment_id, comment_content, comment_date, post_id, user_id FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	$req->execute(array($postId));

	return $comments;
}

function dbConnect()
{

	try {
		$db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
		return $db;
	}

	catch(Exception $e){
		die ('Erreur : '.$e->getMessage());
	}
}