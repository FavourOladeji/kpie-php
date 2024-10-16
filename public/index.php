<?php
use Core\Session;


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';

session_start();
$appUrl = trim(config('app.url'), '/');
define('APP_URL',$appUrl);

require_once base_path('bootstrap.php');
Session::unflash();
