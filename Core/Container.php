<?php

namespace Core;

class Container
{
    protected $bindings = [];

    //add services to the container
    public function bind($key, $resolver): void {
        $this->bindings[$key] = $resolver;
    }

    //resolving services from the container by calling the factory function for that service (the resolver)
    public function resolve($key) {

        if( !array_key_exists($key, $this->bindings) ) {
            throw new \Exception("Could not find a service named " . $key);
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);

    }

}