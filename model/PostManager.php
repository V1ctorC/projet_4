<?php

require_once('model/manager.php');

class PostManager extends Manager
{

	public function getPosts() 
	{

		$db = $this->dbConnect();
		$req = $db->query('SELECT id, post_title, post_content, DATE_FORMAT(post_dateAdd, \'%d/%m/%Y à %Hh%imin%ss\') AS post_dateAdd FROM posts ORDER BY post_dateAdd DESC LIMIT 0, 5');

		return $req;
	}

	public function getPost($postId)
	{

		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, post_title, post_content, DATE_FORMAT(post_dateAdd, \'%d/%m/%Y à %Hh%imin%ss\') AS post_dateAdd FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function addPost($title, $content, $date)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(post_title, post_content, post_dateAdd) VALUES (?, ?, NOW())');
		$req->execute(array($title, $content, $date));
		$post = $req->fetch();

		return $post;
	}
}