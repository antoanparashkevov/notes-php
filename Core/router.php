<?php

$routes = require base_path('routes.php');

//dd($_SERVER);
//dd($_GET);

function abort($status_code = 404): void {
    http_response_code($status_code);
    require base_path("controllers/$status_code.php");

    die();
}

function routeToController($uri, $routes): void {
    if(array_key_exists($uri, $routes)) {
         require base_path($routes[$uri]);
    } else {
        abort();
    }
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);