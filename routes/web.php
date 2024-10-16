<?php

use Core\Router;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;


/**
 * @var Router
 */
$router = app('router');


$router->get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
$router->post('login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
$router->get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
$router->get('error', [LoginController::class, 'error']);
$router->get('', [HomePageController::class, 'index'])->name('home');


