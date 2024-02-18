<?php

namespace App\Core;

use App\Core\AdminNotFoundException;
use App\Core\ClientNotFoundException;

class Route
{
    protected array $routes;

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $requestUrl, string $requestMethod, string $userType): mixed
    {
        $route = explode('?', $requestUrl)[0];
        $route = rtrim($route, '/');

        foreach ($this->routes[$requestMethod] as $pattern => $action) {
            $regexPattern = str_replace('/', '\/', $pattern);
            $regexPattern = '/^' . preg_replace('/{([^\/]+)}/', '([^\/]+)', $regexPattern) . '$/';

            // Kiểm tra xem route có phù hợp với biểu thức chính quy không
            if (preg_match($regexPattern, $route, $matches)) {
                array_shift($matches);

                if (is_callable($action)) {
                    return call_user_func($action);
                }

                if (is_array($action)) {
                    [$class, $method] = $action;

                    if (class_exists($class)) {
                        $classInstance = new $class();

                        if (method_exists($classInstance, $method)) {
                            // Check user type and throw appropriate exception
                            if ($userType === 'admin') {
                                // Kiểm tra nếu vế sau không tồn tại
                                if (empty(parse_url($requestUrl, PHP_URL_PATH))) {
                                    return new AdminNotFoundException();
                                } else {
                                    return call_user_func_array([$classInstance, $method], $matches);
                                }
                            } else {
                                return call_user_func_array([$classInstance, $method], $matches);
                            }
                        }
                    }
                }
            }
        }

        // Throw different exception based on user type
        if ($userType === 'admin' && strpos($requestUrl, '/admin/') === 0) {
            // Kiểm tra nếu vế sau không tồn tại
            if (empty(parse_url($requestUrl, PHP_URL_PATH))) {
                return new AdminNotFoundException();
            } else {
                return new AdminNotFoundException();
            }
        } else {
            return new ClientNotFoundException();
        }
    }
}
