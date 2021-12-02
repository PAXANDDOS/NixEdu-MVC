<?php

class Router
{
    static function start()
    {
        $controller_name = 'home';
        $action_name = 'index';

        $address = explode('?', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $address[0]);
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
            if ($controller_name == 'index' || $controller_name == 'index.php')
                $controller_name = 'home';
        }
        if (!empty($routes[2]))
            $action_name = $routes[2];

        $model_name = ucfirst($controller_name);
        $controller_name = ucfirst($controller_name) . 'Controller';
        $action_name = 'action_' . $action_name;

        $model_file = $model_name . '.php';
        $model_path = APP_MODELS . $model_file;
        if (file_exists($model_path))
            include APP_MODELS . $model_file;

        $controller_file = $controller_name . '.php';
        $controller_path = APP_CONTROLLERS . $controller_file;
        if (file_exists($controller_path))
            include APP_CONTROLLERS . $controller_file;
        else
            Router::ErrorPage404();

        $controller = new $controller_name;
        $action = $action_name;
        if (!empty($address[1])) {
            parse_str($address[1], $query);
            $controller->withQuery($query);
        }

        if (method_exists($controller, $action))
            $controller->$action();
        else
            Router::ErrorPage404();
    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'error');
    }
}
