<?php

use Core\Router;
use Http\Controllers\LoginController;

$router = new Router();

$router->get('login', [LoginController::class, 'index']);
$router->post('login', [LoginController::class, 'store']);
echo "Reached here";
