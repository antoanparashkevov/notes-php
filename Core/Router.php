<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function get($uri, $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];
    }

    public function post($uri, $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'post'
        ];
    }

    public function delete($uri, $controller): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($status_code = 404): void
    {
        http_response_code($status_code);

        require base_path("controllers/$status_code.php");

        die();
    }
}

