<?php
include("./app/etc/env.php");
include("./entity/User.php");

class AuthController
{
	public static function setAuth()
	{
		$request = Flight::request();
		$email = $request->data->email;
		$password = $request->data->password;
		$user = $GLOBALS['$entityManager']->getRepository('User')
			->findOneby(['email' => $email]);

		if (md5($password) == $user->getPassword()) {
			self::setSession($user->getId(), $email, md5($password));
//			echo 'Welcome back, Master!   ' . '<a href='/'> Go home</a>';
		} else {
			echo 'Wrong password';
		}

	}

	public static function setSession($id, $email, $password)
	{
		$_SESSION['id'] = $id;
		$_SESSION['password'] = $password;
		$_SESSION['email'] = $email;

	}

	public static function logout()
	{
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);

	}

}