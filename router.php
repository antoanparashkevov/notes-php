<?php

$routes = require('routes.php');

//dd($_SERVER);
//dd($_GET);

function abort($status_code = 404) {
    http_response_code($status_code);
    require "controllers/$status_code.php";

    die();
}

function routeToController($uri, $routes) {
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);