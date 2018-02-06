<?php

require_once('model/manager.php');

class CommentManager extends Manager
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

	public function editComment($newComment, $commentId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('UPDATE comments SET comment_content = ? WHERE comment_id = ?');
		$affectedLines = $comments->execute(array($newComment, $commentId));

		return $affectedLines;
	}

	public function getComment($commentId)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('SELECT comment_id, comment_content, id, user_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE comment_id = ?');
		$comment->execute(array($commentId));
		$commentA = $comment->fetch();

		return $commentA;
	}

	public function deleteCommentPost($postId)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('DELETE FROM comments WHERE id = ?');
		$comment->execute(array($postId));
	}

	public function deleteComment($commentId)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('DELETE FROM comments WHERE comment_id = ?');
		$comment->execute(array($commentId));
	}

	public function reportComment($commentId)
	{
		$db = $this->dbConnect();
		$comment = $db->prepare('UPDATE comments SET comment_report = comment_report + 1 WHERE comment_id = ?');
		$affectedLines = $comment->execute(array($commentId));

		return $affectedLines;
	}

	public function getReportComment()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT comment_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date, comment_content, comment_report FROM comments WHERE comment_report > 0 ORDER BY comment_report DESC LIMIT 0, 5');

		return $req;
	}

	public function ignoreComment($commentId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET comment_report = 0 WHERE comment_id = ?');
		$affectedLines = $req->execute(array($commentId));

		return $affectedLines;
	}
}