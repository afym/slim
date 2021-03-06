<?php

namespace Pages;

use Util\Page;

class Contact extends Page {

    public static function getPage() {
        self::app()->render('contact/page.php');
    }

    public static function postContact() {
        if (self::app()->request->isPost()) {
            print_r(self::app()->request->post());
            exit;
        }

        self::app()->response->redirect('/contact');
    }

}
