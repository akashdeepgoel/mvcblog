<?php 
	
namespace Controllers;

use Models\Login;
use Models\PostList;
	
class WelcomeController
{	
	protected $twig;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
		$this->twig = new \Twig_Environment($loader);
	}
	// $_SERVER['REQUEST_METHOD'] - request method
	public function post()
	{
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$status=Login::login($user, $pass);
	
	if($status)
	{
		session_start();
		$_SESSION['name']=$user;
		$posts=PostList::getPosts(0);
		foreach($posts as $index =>$value)
		{
			$date= new \DateTime();
			$date->setTimeStamp($value['created_at']);
			$posts[$index]['date']= $date->format('Y-m-d H:i:s');
		}
		echo $this->twig->render("welcome.html", array(
			"title" => "Posts | MVC Blog",
			"username"=> $_SESSION['name'],
			"posts" => $posts));
	}
	else
	{
		echo "Invalid bhai sahab";
	}}
	
}