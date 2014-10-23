<?php
/**
 * Micro framework slim implementado
 */
$dirname = dirname(__DIR__);

require  "{$dirname}/vendor/autoload.php";
require "{$dirname}/vendor/slim/slim/Slim/Slim.php";

use Slim\Slim;
use Zend\Loader\ClassMapAutoloader;

Slim::registerAutoloader();
$loader = new ClassMapAutoloader();
$loader->registerAutoloadMap(array(
    'Pages\Home' => "{$dirname}/pages/Home.php",
));
$loader->register();

$app = new Slim(array(
    'templates.path' => "{$dirname}/templates",
));

$app->get('/sample', 'Pages\Home::getPage');

$app->get('/sample2/:name', 'Pages\Home::getPage2');

$app->config('http.version', '1.1');

$app->get('/hello/:name', function($name) {
    echo "Hello {$name}";
});

$app->get('/', function() use ($app) {
    $app->render('index.php');
});

$app->get('/json', function() use ($app) {
    $app->response->headers->set('Content-Type', 'application/json');
    echo '{"a" : 1, "b" : c}';
});

$app->run();