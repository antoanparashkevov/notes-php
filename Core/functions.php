<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function uriIsValid($uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

#[NoReturn] function abort($status_code = 404): void
{
    http_response_code($status_code);

    require base_path("controllers/$status_code.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($view, $attributes = []): void
{
    //creates variables from each associative array's key
    //ex: [ 'header' => 'value' ] will transform into $header = 'value'
    extract($attributes);
//    var_dump($header);

    require base_path('views/' . $view);
}