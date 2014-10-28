<?php
/**
 * @var method get, post, put, delete
 * @var url Some url /home, /products/:page, 
 * @var action Some action PageClass:StaticMethod
 */
return array(
    array('get', '/', 'Home:getPage'),
    array('get', '/contact', 'Contact:getPage'),
    array('post', '/post/contact', 'Contact:postContact'),
);
