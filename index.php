<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

session_start();

use App\routes;

$routes = new routes();
;
