<?php

Flight::route('/login', array('controllers\UserController', 'login'));
Flight::route('/register', array('controllers\UserController', 'register'));
Flight::route('/auth/login', array('controllers\AuthController', 'setAuth'));
Flight::route('/auth/register', array('controllers\RegisterController', 'registerUser'));
Flight::route('/auth/logout', array('controllers\AuthController', 'logout'));

Flight::route('/profile', array('controllers\ProfileController', 'view'));
Flight::route('/profile/password', array('controllers\ProfileController', 'edit'));
Flight::route('/profile/photo', array('controllers\FileController', 'uploadPhoto'));
