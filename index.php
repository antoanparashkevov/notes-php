<?php

require 'functions.php';
require 'Database.php';
require 'Response.php';
require 'router.php';

//connect to MySQL database;

// $config = require('config.php');

/* config structure
[
    'database => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'myblog',
        'charset' => 'utf8mb4'
    ],
    'username' => 'username',
    'password' => 'password'
]
 * */

// $db = new Database($config['database'], $config['username'], $config['password']);

// $posts = $db->query("select * from posts")->fetchAll();

//dd($posts);
