<?php
namespace controllers;

use Flight;

class MainController
{

	public function __construct()
	{
	}

	public static function runApp ()
	{
		Flight::view()->display('home.php', ['isAuth' => UserController::isAuth()]);
	}

	public static function check ()
	{
		Flight::view()->display('template.html', []);
	}
}
		
