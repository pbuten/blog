<?php


class UserController
{

	public static function isAuth()
	{
		if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
			return true;

		} else {
			return false;
		}
	}

	public static function login()
	{

		Flight::view()->display('user/login.php', ['isAuth' => self::isAuth()]);

	}

	public static function register()
	{
		Flight::view()->display('user/register.php', ['isAuth' => self::isAuth()]);

	}

}