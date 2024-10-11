<?php

use Core\RouteServiceProvider;

$config = require base_path('config.php');
RouteServiceProvider::register();
dd($config);
