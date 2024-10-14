<?php

namespace Core;

use App\Http\Middleware\Middleware;
use Exception;
use ReflectionMethod;

class Router{
    public array $routes  = [];

    public function add($method, $uri, array $action)
    {
        [$controllerClass, $controllerMethod] = $action;
        $this->routes[] = [
            'uri' => trim($uri, '/'),
            'method' => $method,
            'controller_class' => $controllerClass,
            'controller_method' => $controllerMethod,
            'middleware' => null,
            'name' => null
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
    public function name($name)
    {
        $this->routes[array_key_last($this->routes)]['name'] = $name;
        return $this;
    }

    public function route($uri, $method)
    {
        $route = array_filter($this->routes, function (array $routeArray) use($uri, $method) {
            return $routeArray['uri'] == trim($uri, '/') && $routeArray['method'] == strtoupper($method);
        });

        if  (!$route)
        {
            abort(404);
        }

        $route = reset($route);

        Middleware::resolve($route['middleware']);

        $controllerClass = $route['controller_class'];
        $controllerMethod = $route['controller_method'];
        if (!class_exists($controllerClass))
        {
            throw new Exception("Controller class '$controllerClass' does not exist");
        }

        if (!method_exists($controllerClass, $controllerMethod))
        {
            throw new Exception("Method '$controllerMethod' does not exist in controller class '$controllerClass'");
        }

        

        $hasRequestParameter = $this->checkIfControllerHasRequestParameter($controllerClass, $controllerMethod);
        $controller = new $controllerClass();
        $hasRequestParameter ? $controller->{$controllerMethod}(new Request()) : $controller->{$controllerMethod}() ;
        die();
        
    }

    private function checkIfControllerHasRequestParameter($controller, $method)
    {
        $reflectionMethod = new ReflectionMethod($controller, $method);
        $parameters = $reflectionMethod->getParameters();
        $firstParameter = reset($parameters);
        if ($firstParameter && ($parameterType = $firstParameter->getType()) && $parameterType->getName() == Request::class)
        {
            return true;
        }
    
        return false;

    }

    public function routeNameExists($name)
    {
        $routes = array_filter($this->routes, function ($route) use($name) {
            return $route['name'] == $name;
        });
        return empty($routes) ? false: reset($routes);
    }
}
