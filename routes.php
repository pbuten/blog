<?php

Flight::route('/login', array('UserController', 'login'));
Flight::route('/register', array('UserController', 'register'));
Flight::route('/profile', array('ProfileController', 'view'));
Flight::route('/profile/password', array('ProfileController', 'edit'));
Flight::route('/auth/login', array('AuthController', 'setAuth'));
Flight::route('/auth/register', array('RegisterController', 'registerUser'));
Flight::route('/auth/logout', array('AuthController', 'logout'));
Flight::route('/', array('MainController', 'runApp'));

Flight::route('/post/create', array('BlogController', 'add'));
Flight::route('/posts', array('BlogController', 'list'));
Flight::route('/post/update/@id', function($id) {BlogController::update($id);});
Flight::route('/post/display/@id', function($id) {BlogController::display($id);});
Flight::route('/post/delete/@id', function($id) {BlogController::delete($id);});







