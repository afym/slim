<?php

namespace Pages;

use Util\Page;

class Contact extends Page {

    public static function getPage() {
        self::app()->render('contact/page.php');
    }

    public static function postContact() {
        if (self::app()->request->isPost()) {
            
        }

        self::app()->response->redirect('/contact');
    }

}
