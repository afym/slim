<?php
/**
 * Micro framework slim implementado
 */
$dirname = dirname(__DIR__);

require  "{$dirname}/vendor/autoload.php";
require "{$dirname}/vendor/slim/slim/Slim/Slim.php";

use Slim\Slim;

Slim::registerAutoloader();

$app = new Slim(array(
    'templates.path' => "{$dirname}/templates",
));
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