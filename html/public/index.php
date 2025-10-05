<?php
require_once __DIR__ . "/../vendor/autoload.php";
require dirname(__DIR__) . '/config/const.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\App;

App::run();