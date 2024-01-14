<?php

use Core\Container;
use Core\Database;
use Core\App;

//create an object instance
$container = new Container();

//adds services to the container
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database'], $config['username'], $config['password']);//returns a pdo
});;

//dd($container);

//it has a variable named $container inside the App class that is static and can be accessed without instantiating an object instance.
App::setContainer($container);