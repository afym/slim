<?php

namespace Util;

use Slim\View as SlimView;

/**
 * New view class for work with layouts in the view model
 * @author afym <angel.fym@gmail.com>
 * @version 1.0
 */
class View extends SlimView {

    /**
     * @var string Layout name
     */
    private static $layout;

    /**
     * @var array Layout data
     */
    private $layoutData;

    public function __construct() {
        parent::__construct();
        static::$layout = null;
        $this->layoutData = array();
    }

    /**
     * Sets the layout file
     * @return void
     */
    public static function setLayout($layout) {
        static::$layout = $layout;
    }

    public function render($template, $data) {
        $viewResponse = parent::render($template, $data);
        return $this->rederLayout($viewResponse);
    }

    public function setLayoutParam($key, $value) {
        $this->layoutData[$key] = $value;
        return $this;
    }

    private function rederLayout($viewResponse) {
        if (static::$layout != null) {
            $templatePath = $this->getTemplatesDirectory() . '/' . ltrim(static::$layout, '/');
            if (!file_exists($templatePath)) {
                throw new \RuntimeException("View cannot render template $templatePath Template does not exist.");
            }

            $data = array_merge($this->layoutData, array('content' => $viewResponse));
            return parent::render(static::$layout, $data);
        }

        return $viewResponse;
    }

}
