<?php
include("./app/etc/env.php");
include("./entity/User.php");
include('ValidateData.php');

class RegisterController
{
	public static function registerUser()
	{
		$request = Flight::request();
		$email = $request->data->email;
		$password = $request->data->password;

		if (!ValidateData::validate($email, $password)) {
			return 'Can not create a new user';
		}

		$user = new User();
		$user->setEmail($email);
		$user->setPassword(md5($password));

		$GLOBALS['$entityManager']->persist($user);
		$GLOBALS['$entityManager']->flush();
		echo "You are registred!" . '<a href="/login">Please log in here.</a>';
	}

}