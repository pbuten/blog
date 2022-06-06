<?php

namespace controllers;

use entity\User;
use Flight;


class AuthController
{
	public static function setAuth()
	{
		$request = Flight::request();
		$email = $request->data->email;
		$password = $request->data->password;
		$user = $GLOBALS['$entityManager']->getRepository('entity\User')
			->findOneby(['email' => $email]);

		if (md5($password) == $user->getPassword()) {
			self::setSession($user->getId(), $email, md5($password), $user->getRole());
			echo 'Welcome back';
		} else {
			echo 'Wrong password';
		}

	}

	public static function setSession($id, $email, $password, $role)
	{
		$_SESSION['id'] = $id;
		$_SESSION['password'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['role'] = $role;

	}

	public static function logout()
	{
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['role']);

	}

}