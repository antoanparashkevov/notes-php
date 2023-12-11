<?php

const BASE_PATH = __DIR__ . '/../';//root project folder

//__DIR__ points to the absolute current working directory

require BASE_PATH . 'functions.php';

//only instantiate a class when I need it, when I'm trying to access it or make a new object's instance
spl_autoload_register(function ($class) {//automatically triggered by PHP when trying to access a class
    require base_path("Core/{$class}.php");
});

require base_path('router.php');

// $config = require('config.php');

//connect to MySQL database;
// $db = new Database($config['database'], $config['username'], $config['password']);

// $posts = $db->query("select * from posts")->fetchAll();

//dd($posts);
