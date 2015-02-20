<?php 
	
namespace Controllers;

use Models\PostList;
	
class SinglePostDisplayController
{	
	protected $twig;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this->twig = new \Twig_Environment($loader);
	}
	// $_SERVER['REQUEST_METHOD'] - request method
	// display post(s)
	public function get($id)
	{
		$post=PostList::getPost($id);
		
			$date= new \DateTime();
			$date->setTimeStamp($post['created_at']);
			$post['date']= $date->format('Y-m-d H:i:s');
		
		echo $this->twig->render("view_post.html", array(
			"post" => $post));
	}
	public function post()
	{
		$title = $_POST['title'];
		$content = $_POST['content'];
		$created=Post::create($title, $content);
	
	if($created)
	{
		$message = "Post Created";
	}
	else
	{
		$message= "Post Creation failed";
	}

	echo $this->twig->render("post_created.html",array("title"=> $message));
	
	}
}