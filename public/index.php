<?php

/**
 * Index page which starts a micro framework using Slim and Zend
 * 
 * @author afym <angel.fym@gmail.com>
 * @version 1.0
 * @copyright (c) 2014, Velocity
 */
define('BASE_DIR', dirname(__DIR__));

// Getting configuration files
$routes = include BASE_DIR . '/config/route.php';
$configuration = include BASE_DIR . '/config/application.php';
$pages = include BASE_DIR . '/config/page.php';

// Getting Slim and autoload from vendor
require BASE_DIR . '/vendor/autoload.php';
require BASE_DIR . '/vendor/slim/slim/Slim/Slim.php';
require BASE_DIR . '/bootstrap/Bootstrap.php';

use Slim\Slim;
use Zend\Loader\ClassMapAutoloader;
use Bootstrap\Bootstrap;

// Auto registering Slim framework
Slim::registerAutoloader();

// Bootstraping the slim application
$bootstrap = new Bootstrap(new Slim($configuration), new ClassMapAutoloader());
$bootstrap->setRoutes($routes);
$bootstrap->setPages($pages);
$bootstrap->run();
