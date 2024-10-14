<?php

use Core\Router;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;


/**
 * @var Router
 */
$router = app('router');


$router->get('login', [LoginController::class, 'index'])->middleware('auth');
$router->get('', [HomePageController::class, 'index']);


