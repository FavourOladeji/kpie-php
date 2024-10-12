<?php

use Core\App;
use Core\Database;
use Core\Router;
use Core\RouteServiceProvider;


$app = App::getInstance();

$app->singleton('router', function ($app){
    return new Router;
});

$app->singleton('database', function ($app){
    $config = config('database');
    return new Database($config, $config['username'], $config['password']);
});

RouteServiceProvider::handle();
// dd($config);
