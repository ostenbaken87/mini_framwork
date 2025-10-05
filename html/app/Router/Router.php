<?php

namespace App\Router;

use App\Route\Route;
use App\Traits\Helpers;
use Exception;

class Router
{
    use Helpers;

    private array $routes = [];
    private array $matchedParams = [];

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

        $this->error(404);
    }

    private function matchRoute(Route $route, string $requestUrl, string $requestMethod): bool
    {
        //Check method request
        if($route->method !== $requestMethod) {
            return false;
        }
        //Check url request
        if($route->url === $requestUrl) {
            $this->matchedParams = [];
            return true;
        }
        //Dinamic params
        // Supported formats:
        // - /posts/{id}
        // - /posts/{id:\\d+}
        // - Multiple params: /users/{userId}/posts/{postId}
        $pattern = $route->url;
        $paramNames = [];

        $regex = preg_replace_callback('/\{(\w+)(?::([^}]+))?\}/', function ($matches) use (&$paramNames) {
            $paramNames[] = $matches[1];
            $constraint = isset($matches[2]) && $matches[2] !== '' ? $matches[2] : '[^/]+';
            return '(?P<' . $matches[1] . '>' . $constraint . ')';
        }, $pattern);

        $regex = '#^' . $regex . '$#u';

        if (preg_match($regex, $requestUrl, $matches)) {
            $params = [];
            foreach ($paramNames as $name) {
                if (array_key_exists($name, $matches)) {
                    $params[$name] = $matches[$name];
                }
            }
            $this->matchedParams = $params;
            return true;
        }

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
        echo $controller->$action(...array_values($this->matchedParams));
    }
}