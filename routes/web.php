<?php

use Core\Router;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/**
 * @var Router
 */
$router = app('router');


$router->get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
$router->post('login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
$router->get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
$router->get('get-started', [RegisterController::class, 'index'])->middleware('guest')->name('register');
$router->get('', [HomePageController::class, 'index'])->name('home');


