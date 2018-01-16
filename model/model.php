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
	$comments = $db->prepare('SELECT comment_id, comment_content, comment_date, id, user_name FROM comments WHERE id = ? ORDER BY comment_date DESC');
	$comments->execute(array($postId));

	return $comments;

}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id, user_name, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
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