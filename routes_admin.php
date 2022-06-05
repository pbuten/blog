<?php

use controllers\AdminUsersController;

Flight::route('/admin/login', array('controllers\AdminController', 'login'));
Flight::route('/admin/auth/login', array('controllers\AdminController', 'authAdmin'));
Flight::route('/admin', array('controllers\AdminController', 'dashboard'));

Flight::route('/admin/users', array('controllers\AdminUsersController', 'list'));
Flight::route('/admin/user/create', array('controllers\AdminUsersController', 'create'));
Flight::route('/admin/user/delete/@id', function($id) {AdminUsersController::delete($id);});
Flight::route('/admin/user/edit/@id', function($id) {AdminUsersController::view($id);});
Flight::route('/admin/user/updated/@id', function($id) {AdminUsersController::update($id);});






