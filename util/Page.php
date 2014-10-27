<?php

namespace Util;

use Slim\Slim;

abstract class Page {

    /**
     * Gets the new instances
     * @return Slim get a new slim instance
     */
    public static function app() {
        return Slim::getInstance();
    }

}
