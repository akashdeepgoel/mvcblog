<?php 
	
namespace Controllers;

use Models\Post;
	
class PostCreateController
{	
	protected $twig;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this->twig = new \Twig_Environment($loader);
	}
	// $_SERVER['REQUEST_METHOD'] - request method
	public function get()
	{
		session_start();
		$us=$_SESSION['name'];
		echo $this->twig->render("create.html", array(
			"title" => "MVC Blog",
			"message" => array("Hello--","$us")));
	}
	public function post()
	{
		session_start();
		$title = $_POST['title'];
		$content = $_POST['content'];
		$usern= $_SESSION['name'];
		$created=Post::create($title, $content, $usern);
	
	if($created)
	{
		echo "Post Created!! You will be redirected in 5 seconds";
		sleep(5);
	echo $this->twig->render("welcome.html",array("username"=> $usern));
		
	}
	else
	{
		$message= "Post Creation failed";
	}

}
}