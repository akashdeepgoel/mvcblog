<?php 
	
namespace Controllers;

use Models\Login;
	
class LoginController
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
		echo $this->twig->render("login.html", array(
			"title" => "MVC Blog",
			"message" => array("Just Fill the Details")));
	}
	public function login()
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$status=Login::login($user, $pass);
	
	if($status)
	{
		
		echo $this->twig->render("welcome.html",array("username"=> $user));
	}
	else
	{
		echo "Invalid bhai sahab";
	}

	
}

}