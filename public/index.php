<?php

const BASE_PATH = __DIR__ . '/../';//root project folder

//__DIR__ points to the absolute current working directory

require BASE_PATH . 'Core/functions.php';

//only instantiate a class when I need it, when I'm trying to access it or make a new object's instance
spl_autoload_register(function ($class) {//automatically triggered by PHP when trying to access a class
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('Core/router.php');

// $config = require('config.php');

//connect to MySQL database;
// $db = new Database($config['database'], $config['username'], $config['password']);

// $posts = $db->query("select * from posts")->fetchAll();

//dd($posts);
