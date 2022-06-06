<?php
namespace controllers;

use Flight;

class AdminUsersController
{
	public static function list()
	{
		AdminController::checkIfAdmin();
		$users = $GLOBALS['$entityManager']->getRepository('entity\User')->findAll();
		Flight::view()->display('admin/user/list.php', ['users' => $users]);
	}

	public static function create()
	{
		AdminController::checkIfAdmin();
		if (Flight::request()->data->password != null) {
			RegisterController::registerUser();
		}
		Flight::view()->display('admin/user/create.php', []);
	}

	public static function view($id)
	{
		AdminController::checkIfAdmin();
		$user = $GLOBALS['$entityManager']->find('entity\User', $id);
		$roles = $GLOBALS['$entityManager']->getRepository('entity\Role')->findAll();
		$userData = [
			'id' => $user->getId(),
			'email' => $user->getEmail(),
			'password' => $user->getPassword()
		];
		Flight::view()->display('admin/user/update.php', ['userData' => $userData, 'roles' => $roles]);
	}

	public static function update($id)
	{
		AdminController::checkIfAdmin();
		$user = $GLOBALS['$entityManager']->find('entity\User', $id);

		$request = Flight::request();
		$newUserData = [
			'email' => $request->data->email,
			'password' => $request->data->password,
			'role' => $request->data->role
		];

		if (!empty($newUserData['password'])) {
			if (mb_strlen($newUserData['password']) < 3) {
				echo 'Password should be at least 3 symbols';
				return false;
			} elseif (ValidateData::validate($newUserData['email'], $newUserData['password'])) {
				$user->setPassword(md5($newUserData['password']));
			}
		}

		$user->setEmail($request->data->email);
		$user->setRole($request->data->role);
		$GLOBALS['$entityManager']->persist($user);
		$GLOBALS['$entityManager']->flush();

		Flight::view()->display('admin/user/updated.php', []);
	}

	public static function delete($id)
	{
		AdminController::checkIfAdmin();
		$user = $GLOBALS['$entityManager']->getRepository('entity\User')
			->findOneby(['id' => $id]);
		$GLOBALS['$entityManager']->remove($user);
		$GLOBALS['$entityManager']->flush();
		Flight::view()->display('admin/user/delete.php', []);
	}
}