<?php

namespace App\Http\Controllers;

use Framework\View;

class SigninController extends Controller
{
    public function index(): void
    {
        \Framework\Session::redirectIfLogged();

        if (isset($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['password'] = hash("md5", $_POST['password']);
            $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['remoteAddr'] = $_SERVER['REMOTE_ADDR'];
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/account", false, 303);
        }
        View::generate('signin.php', 'template.php');
    }
}
