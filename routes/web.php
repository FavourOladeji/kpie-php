<?php

use Core\Router;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;


/**
 * @var Router
 */
$router = app('router');


$router->get('login', [LoginController::class, 'index'])->middleware('auth');
$router->get('error', [LoginController::class, 'error']);
$router->post('login', [LoginController::class, 'store'])->middleware('auth')->name('login.store');
$router->get('', [HomePageController::class, 'index'])->name('home');


