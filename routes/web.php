<?php

use Core\Router;
use Http\Controllers\HomePageController;
use Http\Controllers\LoginController;


/**
 * @var Router
 */
$router = app('router');


$router->get('login', [LoginController::class, 'index'])->middleware('auth');
$router->get('', [HomePageController::class, 'index']);


