<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include dirname(__FILE__) . '/vendor/autoload.php';
include 'app/etc/env.php';

session_start();

/**
 * Connect to the db
 */
Flight::register('db', 'mysqli', array('localhost', 'admin', 'admin', 'blog'));

/**
 * Initiate Twig, and register to Flight
 */
$loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/views');
$twigConfig = array(
	// 'cache'	=>	'./cache/twig/',
	// 'cache'	=>	false,
	'debug' => true,
);
Flight::register('view', 'Twig_Environment', array($loader, $twigConfig), function ($twig) {
	$twig->addExtension(new Twig_Extension_Debug()); // Add the debug extension
});

/**
 * Add /controllers to the include-path
 */
Flight::path(dirname(__FILE__) . '/controllers');
Flight::path(dirname(__FILE__) . '/models');
Flight::path(dirname(__FILE__) . '/repositories');

/**
 * Include routes
 */
include dirname(__FILE__) . '/routes.php';
include dirname(__FILE__) . '/routes_admin.php';

Flight::start();
