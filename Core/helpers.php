<?php

use Core\App;

if (!function_exists('base_path'))
{
    function base_path(string $path)
    {
        return BASE_PATH . $path;
    }
}

if (!function_exists('dd'))
{
    function dd($payload)
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
    $config ?: require base_path('config.php');
    if (array_key_exists($key, $config))
    {
        return $config[$key];
    }
    return $default;

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



