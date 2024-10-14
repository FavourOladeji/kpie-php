<?php


const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';

$appUrl = trim(config('app.url'), '/');
define('APP_URL',$appUrl);

require_once base_path('bootstrap.php');


dd($_SERVER);
