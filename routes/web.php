<?php

use Core\Router;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;


/**
 * @var Router
 */
$router = app('router');


$router->get('login', [LoginController::class, 'index'])->middleware('guest');
$router->get('error', [LoginController::class, 'error']);
$router->post('login', [LoginController::class, 'store'])->middleware('gest')->name('login.store');
$router->get('', [HomePageController::class, 'index'])->name('home');


