<?php

namespace Models;

class Post
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

	public static function create($title,$content,$user)
	{   
		$db = self::getDB();
		$time= time();
		$statement=$db->prepare("INSERT INTO posts (title,content,created_at,user) 
					  					 VALUES(:title, :content, :created_at, :user)");
		$result=$statement->execute(array(
			"title" => $title,
			"content" => $content,
			"created_at" => $time,
			"user"=> $user));

		if($result){
			return true;
		}
		else
		{
			return false;
		}
	}




				
}