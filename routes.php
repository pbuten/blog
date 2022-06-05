<?php

use controllers\BlogController;

Flight::route('/login', array('controllers\UserController', 'login'));
Flight::route('/register', array('controllers\UserController', 'register'));
Flight::route('/profile', array('controllers\ProfileController', 'view'));
Flight::route('/profile/password', array('controllers\ProfileController', 'edit'));
Flight::route('/auth/login', array('controllers\AuthController', 'setAuth'));
Flight::route('/auth/register', array('controllers\RegisterController', 'registerUser'));
Flight::route('/auth/logout', array('controllers\AuthController', 'logout'));
Flight::route('/', array('controllers\MainController', 'runApp'));

Flight::route('/post/create', array('controllers\BlogController', 'add'));
Flight::route('/posts', array('controllers\BlogController', 'list'));
Flight::route('/post/update/@id', function($id) {BlogController::update($id);});
Flight::route('/post/display/@id', function($id) {BlogController::display($id);});
Flight::route('/post/delete/@id', function($id) {BlogController::delete($id);});




