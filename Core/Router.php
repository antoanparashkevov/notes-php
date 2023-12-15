<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected $routes = [];

    protected function add($method, $uri, $controller, $middleware = null ) {
        $this->routes[] = compact('method', 'uri', 'controller', 'middleware');

        return $this;
    }

    public function get($uri, $controller)
    {

        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key) {

        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        //dd($this->routes);
        //dd($this->routes[0]);

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                //apply the middleware

                if( $route['middleware'] === 'guest' ) {

                    if( isset($_SESSION['user']) ) {
                        header('location: /');
                        die();
                    }
                } else if( $route['middleware'] === 'auth' ) {

                    if( !isset($_SESSION['user']) ) {
                        header('location: /');
                        die();
                    }
                }

                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    #[NoReturn] protected function abort($status_code = 404): void
    {
        http_response_code($status_code);

        require base_path("controllers/$status_code.php");

        die();
    }
}

