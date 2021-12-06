<?php

namespace App\Http\Controllers;

use Framework\View;

/**
 * Contains controller methods for route and each subroute of authorization pages
 */
class AuthController implements Controller
{
    /**
     * Controls the sign in page.
     *
     * @return void
     */
    public function index(): void
    {
        \Framework\Session::redirectIfLogged();

        if (isset($_POST['name'])) {
            \Framework\Session::create('name', $_POST['name']);
            \Framework\Session::create('userAgent', $_SERVER['HTTP_USER_AGENT']);
            \Framework\Session::create('remoteAddr', $_SERVER['REMOTE_ADDR']);
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/account", false, 303);
        }
        View::generate('signIn.php', 'template.php');
    }

    /**
     * Controls the sign up page.
     *
     * @return void
     */
    public function signUp(): void
    {
        \Framework\Session::redirectIfLogged();

        if (isset($_POST['name'])) {
            \Framework\Session::create('name', $_POST['name']);
            \Framework\Session::create('userAgent', $_SERVER['HTTP_USER_AGENT']);
            \Framework\Session::create('remoteAddr', $_SERVER['REMOTE_ADDR']);
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/account", false, 303);
        }
        View::generate('signUp.php', 'template.php');
    }
}
