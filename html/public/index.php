<?php
session_start();

require_once __DIR__ . "/../vendor/autoload.php";
require dirname(__DIR__) . '/config/const.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\App;

try {
    App::run();
} catch (Throwable $e) {
    http_response_code(500);
    include VIEWS . "/errors/500.view.php";
}