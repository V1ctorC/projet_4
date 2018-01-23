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

	/*public function connectUser($mail, $password)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT user_id, user_name FROM user WHERE user_mail = ? AND user_password = ?');
		$req->execute(array($mail, $password));
		$log = $req->fetch();

		return $log;
	}*/

	public function verifPseudo($pseudo)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT user_name FROM user WHERE user_name = ?');
		$req->execute(array($pseudo));
		$verif = $req->fetch();

		return $verif;
	}

	public function verifMail($mail)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT user_mail FROM user WHERE user_mail = ?');
		$req->execute(array($mail));
		$verif = $req->fetch();

		return $verif;
	}

	public function hashPassword($mail)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT user_id, user_name, user_password FROM user WHERE user_mail = ?');
		$req->execute(array($mail));
		$hash = $req->fetch();

		return $hash;
	}

}