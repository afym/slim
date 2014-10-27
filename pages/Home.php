<?php

namespace Pages;

use Util\Page;

class Home extends Page {

    public static function getPage() {
        self::app()->render('home/page.php');
    }

}
