<?php

namespace Framework;

class Session
{
    public static function redirectIfNotLogged()
    {
        if (!isset($_SESSION['name']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
    }

    public static function redirectIfLogged()
    {
        if (isset($_SESSION['name']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/account", false, 303);
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['name']);
    }

    public static function protect(): void
    {
        if (isset($_SESSION['userAgent'])) {
            if (
                $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'] ||
                $_SESSION['remoteAddr'] != $_SERVER['REMOTE_ADDR']
            ) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params['path'],
                    $params['domain'],
                    $params['secure'],
                    $params['httponly']
                );
                session_destroy();
            }
        }
    }
}
