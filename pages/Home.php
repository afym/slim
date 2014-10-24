<?php

namespace Pages;

use Slim\Slim;

class Home {
    public static function getPage() {
        $app = Slim::getInstance();
        $app->render('page.php');
    }

    public static function getPage2($name) {
        $app = Slim::getInstance();
        $app->render('page2.php', array('name' => $name));
    }
}
