<?php

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $path, array $params): void
    {
        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];
    }

    public function match(string $path): array|bool
    {
        error_log("Matching path: " . $path . "\n", 3, "path_match.log");
        $path = rtrim($path, '/'); // Trim the trailing slash if present
        foreach ($this->routes as $route) {
            $routePath = rtrim($route["path"], '/'); // Also trim the trailing slash from defined routes
            if ($routePath === $path) {
                return $route["params"];
            }
        }
        return false;
    }
    
}