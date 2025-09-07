<?php

namespace App\Route;

class Route
{
    public function __construct(
        public string $method,
        public string $url,
        public string $controller,
        public string $action
    ){}

    public static function get(string $url, string $controller, string $action): self
    {
        return new self('GET', $url, $controller, $action);
    }

    public static function post(string $url, string $controller, string $action): self
    {
        return new self('POST', $url, $controller, $action);
    }

    public static function put(string $url, string $controller, string $action): self
    {
        return new self('PUT', $url, $controller, $action);
    }

    public static function delete(string $url, string $controller, string $action): self
    {
        return new self('DELETE', $url, $controller, $action);
    }
}