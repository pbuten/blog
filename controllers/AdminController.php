<?php
include("./app/etc/env.php");

class AdminController
{
	public static function login()
	{
		Flight::view()->display('admin/auth/login.php', []);
	}

	public static function dashboard()
	{
		self::checkIfAdmin();
		Flight::view()->display('admin/dashboard/dashboard.php', []);
	}

	public static function authAdmin()
	{
		$request = Flight::request();
		$email = $request->data->email;
		$password = $request->data->password;
		$user = $GLOBALS['$entityManager']->getRepository('User')
			->findOneby(['email' => $email]);

		$role = $GLOBALS['$entityManager']->find('Role', $user->getRole());
		$permissions = $role->getPermissions();
		$permissions_arr = json_decode($permissions, true);

		if (md5($password) == $user->getPassword() && $permissions_arr['admin_access'] == 'true') {
			self::setSession($user->getId(), $email, md5($password), $user->getRole());
			echo 'Welcome back, Master!   ' . '<a href="/admin">' . 'Go to the Admin Panel' . '</a>';
		} else {
			RoleController::denyAccess();
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

	public static function checkIfAdmin()
	{
		try {
			$user = $GLOBALS['$entityManager']->find('Role', $_SESSION['id']);
			try {
				if ($user->getRole() != 1) {
					RoleController::denyAccess();
				}
			} catch (Throwable $e) {
				if ($e->getMessage() == 'Undefined index: role') {
					RoleController::denyAccess();
				}
			}
		} catch (Throwable $e) {
			if ($e->getMessage() == 'Undefined index: id') {
				RoleController::denyAccess();
			}
		}
	}
}