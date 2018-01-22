<?php

require_once('model/manager.php');

class UserManager extends Manager
{
	
	public function createUser($mail, $pseudo, $password) 
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO user(user_mail, user_name, user_password) VALUES(?, ?, ?)');
		$affectedLines = $req->execute(array($mail, $pseudo, $password));

		return $affectedLines;
	}

	public function connectUser($mail, $password)
	{
		$db = this->dbConnect();
		$req = $db->prepare('SELECT user_id, user_name FROM user WHERE user_name = ? AND user_password = ?');
		$affectedLines = $req->execute(array($mail, $password));

		return $affectedLines;
	}

}