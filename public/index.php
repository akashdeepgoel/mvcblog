<?php

require_once __DIR__ . "/../vendor/autoload.php";

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/create"=> "Controllers\\PostCreateController",
	"/posts/all"=> "Controllers\\PostDisplayController",
	"/posts/:number"=>"Controllers\\SinglePostDisplayController",
	"/login"=> "Controllers\\LoginController",
	"/welcome"=> "Controllers\\WelcomeController"
	));
