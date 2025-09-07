<?php

namespace App\Router;

use App\Route\Route;
use App\Traits\Helpers;
use Exception;

class Router
{
    use Helpers;

    private array $routes = [];

    public function __construct(){$this->loadRoutes();}

    public function loadRoutes(): void
    {
        $this->routes = require ROOT . "/config/routing.php";
    }

    public function run(): void
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($this->matchRoute($route, $requestUri, $requestMethod)) {
                $this->callController($route);
                return;
            }
        }

        $this->error(500);
    }

    private function matchRoute(Route $route, string $requestUrl, string $requestMethod): bool
    {
        //Check method request
        if($route->method !== $requestMethod) {
            return false;
        }
        //Check url request
        if($route->url === $requestUrl) {
            return true;
        }
        //Dinamic params
        
        return false;
    }

    private function callController(Route $route): void
    {
        $controllerClass = 'App\Controllers\\' . $route->controller;
        $action = $route->action;

        //Check exists controller
        if (!class_exists($controllerClass)) {
            throw new Exception("Controller {$controllerClass} not found");
        }

        //Check action exists
        if(!method_exists($controllerClass,$action)) {
            throw new Exception("Method {$action} not found in controller {$controllerClass}");
        }

        $controller = new $controllerClass();
        echo $controller->$action();
    }
}