<?php

require('functions.php');

//dd($_SERVER);

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//dd(parse_url($uri));

$routes = array(
    '/' => 'controllers/index.php',
    '/hero' => 'controllers/hero.php'
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

//routeToController($uri, $routes);

$dsn = 'mysql:host=localhost;post=3306;dbname=myblog;charset=utf8mb4';

$pdo = new PDO($dsn, 'username', 'password');

$statement = $pdo->prepare("select * from posts");

$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
