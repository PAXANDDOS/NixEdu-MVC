<?php

namespace Framework;

class Route
{
    public static function start(): array
    {
        $routes = require_once APP_ROOT . '/routes/web.php';
        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $urn = explode('/', $uri[0]);
        if ($urn[1] === 'index' || $urn[1] === 'index.php')
            $urn[1] = '';
        foreach ($routes as $route => $action) {
            if (preg_match("/\/$urn[1]\/?$/", $route) && preg_match("/\/$urn[1]\/?$/", $uri[0]))
                return [new $action[0], $action[1], []];
            else if (preg_match("/\/$urn[1]\/[^\/]+/", $route))
                return [new $action[0], $action[1], [$urn[2]]];
        }
        Route::Throw404();
    }

    private static function Throw404(): void
    {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        header("Location:http://" . $_SERVER['HTTP_HOST'] . "/404");
    }
}
