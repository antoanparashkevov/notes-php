<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    protected function add($method, $uri, $controller, $middleware = null)
    {
        //compact() is the opposite of extract(). Takes as many arguments as we want and group them by creating an associative array that keys will be the arguments
        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');

        return $this;
    }

    public function get($uri, $controller): Router
    {

        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): Router
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): Router
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key): Router
    {

        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method): mixed
    {
        foreach ($this->routes as $route) {

            //if it matches both the uri and the method, require the controller
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                //apply the middleware
                Middleware::resolve($route['middleware']);

                return require base_path('Http/Controllers/' . $route['controller']);
            }
        }
        return $this->abort();
    }

    public function previousUrl(): string
    {
        //this variable will point to the previous url. For ex: http://php.web/notes
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort($status_code = 404): mixed
    {
        http_response_code($status_code);

        return require base_path("Http/Controllers/{$status_code}.php");
    }
}

