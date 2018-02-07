<?php

require_once('./model/manager.php');

class PostManager extends Manager
{

	public function getPosts() 
	{

		$db = $this->dbConnect();
		$req = $db->query('SELECT id, post_title, post_content, DATE_FORMAT(post_dateAdd, \'%d/%m/%Y\') AS post_dateAddFormat FROM posts ORDER BY post_dateAdd DESC');

		return $req;
	}

	public function getPost($postId)
	{

		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, post_title, post_content, DATE_FORMAT(post_dateAdd, \'%d/%m/%Y\') AS post_dateAddFormat FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function addPost($title, $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO posts(post_title, post_content, post_dateAdd) VALUES (?, ?, NOW())');
		$post = $req->execute(array($title, $content));

		return $post;
	}

	public function editPost($newTitle, $newContent, $postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET post_title = ?, post_content = ?, post_dateModif = NOW() WHERE id = ?');
		$affectedLines = $req->execute(array($newTitle, $newContent, $postId));

		return $affectedLines;
	}

	public function deletePost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id = ?');
		$req->execute(array($postId));

	}
}