<?php

namespace App\Http\Controllers;

use Framework\View;

class AccountController extends Controller
{
    public function index(): void
    {
        \Framework\Session::redirectIfNotLogged();

        if (!isset($_SESSION['name']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        }
        View::generate('account.php', 'template.php');
    }
}
