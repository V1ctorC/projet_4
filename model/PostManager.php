<?php

class PostManager
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

	private function dbConnect()
	{

		$db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root');
		return $db;
	}
}