<?php
//var_dump($_SESSION);//cannot access the super global because at this point of time, the session is not started.

//start a new session that allows us to store some information about the current session inside the $_SESSION super global
session_start();

//using namespaces
use Core\Session;
use Core\Router;
use Core\ValidationException;

//__DIR__ points to the absolute current working directory (in our case that is inside the public directory)
const BASE_PATH = __DIR__ . '/../';//root project folder

require BASE_PATH . 'Core/functions.php';

//only instantiate a class when I need it, when I'm trying to access it or make a new object's instance
spl_autoload_register(function ($class) {//automatically triggered by PHP when trying to access a class
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);//replace \ with / since $class returns the namespace

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new Router();

require base_path('routes.php');//will populate the $routes variable inside the Router class

//$_SERVER['REQUEST_URI'] returns both the path and the query without indicating which one is the path.
//parse_url() parses the REQUEST_URI and returns an associative array with exact 2 keys
//1. the path
//2. the query
//That's the way we distinguish the path from the query
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//the _method is an input name which is hidden. This indicates what method should we use since the form html tag accepts either GET or POST request, but not for example a DELETE
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

//catches all errors from all controllers
try {
    $router->route($uri, $method);//this line of code searches for the corresponding controller and tries to require it.
} catch (ValidationException $error) {
    Session::flash('errors', $error->errors());
    Session::flash('old', [
        'email' => $error->old()['email'],
        'body' => $error->old()['body']
    ]);

    redirect($router->previousUrl());
}

//clear the _flash key and value that stores a temporary data such as errors from form validation, the old input field value
//this means for the next request, the _flash will be gone with all the data inside the key
Session::unflash();