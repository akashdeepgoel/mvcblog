<?php

namespace Models;

class Login
{
	protected $db;

	public function __construct()
	{
		$this->db = new \PDO("mysql:dbname=blogdb;host=localhost","root","password");
	}

	public static function getDB()
	{
		return new \PDO("mysql:dbname=blogdb;host=localhost","root","password");
	}

	public static function login($user,$pass)
	{   
		$db = self::getDB();
		$time= time();
		$statement=$db->query("SELECT * FROM users WHERE usr='$user' && passw='$pass'");
		$numrows=$statement->rowCount();
		if($numrows>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}




				
}