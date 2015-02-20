<?php 
	
namespace Controllers;
	
class HomeController
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
		echo $this->twig->render("index.html", array(
			"title" => "MVC Blog",
			"message" => array("Welcome To This Blogpost")));
	}
	public function logout()
	{
		session_destroy();
		session_unset();
	 	echo $this->twig->render("index.html", array(
			"title" => "MVC Blog",
			"message" => array("Welcome To This Blogpost")));
	}

}	