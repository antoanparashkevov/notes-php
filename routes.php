<?php

//dd($_SERVER);
//dd($_GET);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = array(
    '/' => 'controllers/index.php',
    '/notes' => 'controllers/notes.php',
    '/auth' => 'controllers/auth.php',
    '/note' => 'controllers/note.php'
);

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

routeToController($uri, $routes);