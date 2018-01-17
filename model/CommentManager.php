<?php

class CommentManager
{
	
	public function getComments($postId)
	{

	$db = $this->dbConnect();
	$comments = $db->prepare('SELECT comment_id, comment_content, id, user_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE id = ? ORDER BY comment_date DESC');
	$comments->execute(array($postId));

	return $comments;

	}

	public function postComment($postId, $author, $comment)
	{
    $db = $this->dbConnect();
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