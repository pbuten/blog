<?php

Flight::route('/admin/login', array('AdminController', 'login'));
Flight::route('/admin/auth/login', array('AdminController', 'authAdmin'));
Flight::route('/admin', array('AdminController', 'dashboard'));

Flight::route('/admin/users', array('AdminUsersController', 'list'));
Flight::route('/admin/user/create', array('AdminUsersController', 'create'));
Flight::route('/admin/user/delete/@id', function($id) {AdminUsersController::delete($id);});
Flight::route('/admin/user/edit/@id', function($id) {AdminUsersController::view($id);});
Flight::route('/admin/user/updated/@id', function($id) {AdminUsersController::update($id);});






