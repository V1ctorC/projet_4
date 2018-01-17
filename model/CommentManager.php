<?php

class CommentManager
{
	
	function getComments($postId)
	{

	$db = dbConnect();
	$comments = $db->prepare('SELECT comment_id, comment_content, comment_date, id, user_id FROM comments WHERE id = ? ORDER BY comment_date DESC');
	$comments->execute(array($postId));

	return $comments;

	}

	function postComment($postId, $author, $comment)
	{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id, user_id, comment_content, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
	}


	private function dbConnect()
	{

		$db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
		return $db;
	}
}