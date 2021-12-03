<?php

namespace Framework;

use Framework\Exceptions\NotFoundException;

class Route
{
    static function start()
    {
        $routes = require_once APP_ROOT . '/routes/web.php';
        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $urn = explode('/', $uri[0]);
        if ($urn[1] === 'index' || $urn[1] === 'index.php')
            $urn[1] = '';
        foreach ($routes as $route => $action) {
            if (preg_match('/\/' . $urn[1] . '\/?$/', $route) && preg_match('/\/' . $urn[1] . '\/?$/', $uri[0])) {
                $class = new $action[0];
                $method = $action[1];
                $class->$method();
                return;
            } else if (preg_match('/\/' . $urn[1] . '\/[^\/]+/', $route)) {
                try {
                    $id = $urn[2];
                    $class = new $action[0];
                    $method = $action[1];
                    $class->$method($id);
                    return;
                } catch (NotFoundException $e) {
                    Route::Throw404();
                }
            }
        }
        Route::Throw404();
    }

    static function Throw404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
