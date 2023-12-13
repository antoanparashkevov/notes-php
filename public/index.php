<?php

use Core\Router as Router;

const BASE_PATH = __DIR__ . '/../';//root project folder

//__DIR__ points to the absolute current working directory

require BASE_PATH . 'Core/functions.php';

//only instantiate a class when I need it, when I'm trying to access it or make a new object's instance
spl_autoload_register(function ($class) {//automatically triggered by PHP when trying to access a class
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Router();

require base_path('routes.php');//will populate the $routes variable inside the Router class

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// $config = require('config.php');

//connect to MySQL database;
// $db = new Database($config['database'], $config['username'], $config['password']);

// $posts = $db->query("select * from posts")->fetchAll();

//dd($posts);
