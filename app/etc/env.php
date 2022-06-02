<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Configure doctrine orm
 */

$paths = array(__DIR__ . '/entity/');
$isDevMode = false;

// the connection configuration
$dbParams = array(
	'driver' => 'pdo_mysql',
	'user' => 'admin',
	'password' => 'admin',
	'dbname' => 'blog',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);
$GLOBALS['$entityManager'] = $entityManager;