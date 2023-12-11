<?php

namespace Core;

class Router
{
    protected $routes = [];

    protected function add($method, $uri, $controller ): void {
        $this->routes[] = compact('method', 'uri', 'controller');
    }

    public function get($uri, $controller): void
    {

        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
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

