<?php

namespace controllers;

use Flight;

class FileController
{
	public static function uploadPhoto()
	{
		if (!empty($_FILES['file'])) {
			self::uploadFile($_FILES);
		} else {
			echo 'no file';
		}
		Flight::view()->display('user/fotoupload.php', ['isAuth' => UserController::isAuth()]);
	}

	protected static function uploadFile($file)
	{
		self::generateDirectory();
		$uploadDir = 'media/uploads/' . $_SESSION['id'] . '/';
		$uploadFile = $uploadDir . basename(time() . $file['file']['name']);

		if (move_uploaded_file($file['file']['tmp_name'], $uploadFile)) {
			chmod($uploadFile, 0777);
			ProfileController::setPhoto($uploadFile);
			echo 'Loaded';
		} else {
			echo 'not loaded';
		}
	}

	protected static function generateDirectory()
	{
		if (!file_exists('media/uploads/' . $_SESSION['id'] . '/')) {
			$dirPath = 'media/uploads/' . $_SESSION['id'] . '/';
			mkdir($dirPath, 0777, true);
		}
		$dirPath = 'media/uploads/' . $_SESSION['id'] . '/*';
		$files = glob($dirPath); // get all file names
		foreach($files as $file){ // iterate files
			if(is_file($file)) {
				unlink($file); // delete file
			}
		}
	}

}