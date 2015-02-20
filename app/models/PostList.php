<?php

namespace Models;

class PostList
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

	public static function getPosts($offset,$limit = 10)
	{   
		$db = self::getDB();
		$posts = array();
		$statement=$db->prepare("SELECT * FROM posts ORDER BY timestamp ASC LIMIT :limit OFFSET :offset ");
		$statement->bindValue(':limit',$limit, \PDO::PARAM_INT);
		$statement->bindValue(':offset',$offset, \PDO::PARAM_INT);
		$statement->execute();
			
		while($row=$statement->fetch(\PDO::FETCH_ASSOC))
		{
			$posts[] = $row;		
		}

			return $posts;

	}
    public static function getPost($id)
	{   
		$db = self::getDB();
		$post = array();
		$statement=$db->prepare("SELECT * FROM posts WHERE id=:id");
		$statement->bindValue(':id',$id, \PDO::PARAM_INT);
		$statement->execute();
			
		$post = $statement->fetch(\PDO::FETCH_ASSOC);
		return $post;

	}
}




				
