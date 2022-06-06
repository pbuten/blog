<?php
namespace controllers;

use entity\User;
use Flight;

class RegisterController
{
	public static function registerUser()
	{

		$request = Flight::request();
		$email = $request->data->email;
		$password = $request->data->password;

		if (mb_strlen($password) < 3) {
			echo 'Password should be at least 3 symbols';
			exit;
		}

		if (!ValidateData::validate($email, $password)) {
			echo "Can not create a new user - data isn't valid.";
			return false;
		}

		if (!ValidateData::emailCheck($email)) {
			echo "Can not create a new user - this email is in use.";
			return false;
		}

		$user = new User();
		$user->setEmail($email);
		$user->setPassword(md5($password));
		$user->setRole(2);

		$GLOBALS['$entityManager']->persist($user);
		$GLOBALS['$entityManager']->flush();
		Flight::view()->display('user/registered.php', []);

	}
}