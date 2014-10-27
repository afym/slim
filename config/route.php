<?php

return array(
    array('get', '/', 'Home::getPage'),
    array('get', '/game', 'Home::getPage'),
    array('get', '/sample2/:name', 'Home::getPage2'),
    array('get', '/sample', 'Home::getPage'),
);
