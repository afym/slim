<?php

namespace Bootstrap;

use Slim\Slim;
use Zend\Loader\ClassMapAutoloader;

class Bootstrap {

    private $slim;
    private $loader;
    private $routes;
    private $pages;

    public function __construct(Slim $slim, ClassMapAutoloader $loader) {
        $this->slim = $slim;
        $this->loader = $loader;
        $this->routes = array();
        $this->pages = array();
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function setRoutes($routes) {
        $this->routes = $routes;
    }

    public function run() {
        $this->runPages();
        $this->runRoutes();
        $this->slim->run();
    }

    private function runPages() {
        $this->loader->registerAutoloadMap($this->pages);
        $this->loader->register();
    }

    private function runRoutes() {
        foreach ($this->routes as $route) {
            $method = $route[0];
            $url = $route[1];
            $action = "Pages\\{$route[2]}";
            $this->slim->$method($url, $action);
        }
    }

}
