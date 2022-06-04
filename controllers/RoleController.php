<?php
include("./app/etc/env.php");
include("./entity/Role.php");
//include("./entity/User.php");

class RoleController
{
	protected $doctrine;
	public function __construct()
	{
		$this->doctrine = $GLOBALS['$entityManager'];
	}
	public function getRole($role_id)
	{
		return $this->doctrine->find('Role', $role_id);
	}

	public function hasRole ($user_id, $role_id)
	{
		$user = $this->doctrine->find('User', $user_id);

		if ($user->getRole() == $role_id ) {
			return true;
		} else {
			self::denyAccess();
		}

	}

	public function updateRole()
	{

	}

	public static function denyAccess()
	{
		header('HTTP/1.0 403 Forbidden');
		$contents = file_get_contents('views/admin/403.html', TRUE);
		exit($contents);

	}

}