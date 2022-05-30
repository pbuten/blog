<?php

class MainController
{

	public function __construct()
	{
	}

	public static function runApp ()
	{
		Flight::view()->display('home.html', []);
	}

	public static function check ()
	{
		Flight::view()->display('template.html', []);
	}
}
		
