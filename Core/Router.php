<?php

namespace Core;

class Router{
    public array $routes  = [];

    public function add($method, $uri, array $action)
    {
        [$controllerClass, $controllerMethod] = $action;
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller_class' => $controllerClass,
            'controller_method' => $controllerMethod,
            'middleware' => null
        ];
    }
    public function get($uri, array $action)
    {
        $this->add('GET', strtolower($uri), $action);
        return $this;
    }

    public function post($uri, array $action)
    {
        $this->add('POST', strtolower($uri), $action);
        return $this;
    }

    public function delete($uri, array $action)
    {
        $this->add('DELETE', strtolower($uri), $action);
        return $this;
    }

    public function patch($uri, array $action)
    {
        $this->add('PATCH', strtolower($uri), $action);
        return $this;
    }

    public function put($uri, array $action)
    {
        $this->add('PUT', strtolower($uri), $action);
        return $this;
    }

    public function middleware($middleware)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;
        return $this;
    }
}
