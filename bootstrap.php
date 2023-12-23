<?php

use Core\Container;
use Core\Database;
use Core\App;

$container = new Container();

//adds services to the container
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database'], $config['username'], $config['password']);
});;

App::setContainer($container);