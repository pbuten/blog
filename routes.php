<?php

Flight::route('/', array('MainController', 'runApp'));

Flight::route('/post/create', array('BlogController', 'add'));
Flight::route('/posts', array('BlogController', 'list'));
Flight::route('/post/update/@id', function($id) {BlogController::update($id);});
Flight::route('/post/display/@id', function($id) {BlogController::display($id);});
Flight::route('/post/delete/@id', function($id) {BlogController::delete($id);});







