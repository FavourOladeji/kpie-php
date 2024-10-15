<?php

use Core\App;
use Core\Router;
use Core\Session;

if (!function_exists('base_path'))
{
    function base_path(string $path)
    {
        return BASE_PATH . $path;
    }
}

if (!function_exists('dd'))
{
    function dd($payload = '')
    {
       dump($payload);
       die();
    }
}


if (!function_exists('dump'))
{
    function dump($payload)
    {
        echo "<pre>";
        var_dump($payload);    
        echo "</pre>";

    }
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/errors/{$code}.php");

    die();
}

function config($key, $default = null)
{
    static $config = [];
    $config = $config ?: require base_path('config.php');
    //Handle dot notation;
    $keys = explode('.', $key);
    $value = $config;
    foreach ($keys as $k)
    {  
        if (array_key_exists($k, $value))
        {
            $value = $value["$k"];
        } else {
            return $default;
        }

    }
    return $value;

}

function app($key=null)
{
    $app = App::getInstance();
    return $key ? $app->make($key) : $app;
}

function db()
{
    return app('database');
}

function view(string $path, array $attributes = [])
{
    $viewFilename = base_path("views/{$path}.view.php");
    if (!file_exists($viewFilename))
    {
        throw new Exception("The view '$path.php' does not exist");
    }
    
    extract($attributes);
    require_once $viewFilename;
}

function asset($path)
{
    $appUrl = config('app.url'); 
    return "{$appUrl}/assets/{$path}";
}

function route($routeName)
{
    /**
     * @var Router
     */
    $router = app('router');

    $route = $router->routeNameExists($routeName);

    if (!$routeName || !$route)
    {
        throw new Exception("Route name '$routeName' does not exist");
    }
    
    return APP_URL . "/{$route['uri']}";

}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function errors($key)
{
    $errors = Session::get('errors');
    if (!$errors)
    {
        return null;
    }
    return $errors[$key] ?? null;
}



