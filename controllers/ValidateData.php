<?php
namespace controllers;


class ValidateData
{
	public static function validate($email, $password): bool
	{
		if (!empty($email) && !empty($password)) {
			self::clearData($email);
			self::clearData($password);
			return true;
		} else {
			return false;
		}
	}

	public static function clearData($value): string
	{
		$value = trim($value);
		$value = strip_tags($value);
		$value = str_replace(' ', '', $value);
		$value = stripcslashes($value);

		return $value;
	}

	public static function emailCheck($email)
	{
		$newUser = ($GLOBALS['$entityManager']->getRepository('entity\User')->findOneby(['email' => $email]));
		if ($newUser != null) {
			return false;
		} else {
			return true;
		}
	}

}