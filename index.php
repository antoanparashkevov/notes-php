<?php

require('functions.php');

//dd($_SERVER);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//dd(parse_url($uri));

$routes = array(
    '/' => 'controllers/index.php',
    '/hero' => 'controllers/hero.php'
);

if(array_key_exists($uri, $routes)) {
    require $routes[$uri];
}