<?php
include("./app/etc/env.php");
include("./entity/User.php");
include "ValidateData.php";

class ProfileController
{
	public $id;

	public function __construct()
	{
		if (!empty($_SESSION['id'])) {
			$this->id = $_SESSION['id'];
		} else {
			echo "You are not authorized!";
		}

	}

	public static function view()
	{
		$user_id = new ProfileController();
		$user = $GLOBALS['$entityManager']->find('User', $user_id->id);

		$userData = [
			'id' => $user->getId(),
			'email' => $user->getEmail(),
			'password' => $user->getPassword()
		];
		Flight::view()->display('user/profile.php', ['userData' => $userData, 'isAuth' => UserController::isAuth(), 'session' => $_SESSION]);
	}

	public static function edit()
	{

		$user_id = new ProfileController();
		$user = $GLOBALS['$entityManager']->find('User', $user_id->id);

		$request = Flight::request();
		$password = $request->data->password;
		$email = $_SESSION['email'];
		Flight::view()->display('user/passwordChange.php', ['isAuth' => UserController::isAuth(), 'session' => $_SESSION]);

		if (mb_strlen($password) < 3){
			echo 'Password should be at least 3 symbols';
			exit;
		} elseif (ValidateData::validate($email, $password)) {
			$user->setPassword(md5($password));
			$GLOBALS['$entityManager']->persist($user);
			$GLOBALS['$entityManager']->flush();
			echo "Password was successfully changed!";
		}
	}
}