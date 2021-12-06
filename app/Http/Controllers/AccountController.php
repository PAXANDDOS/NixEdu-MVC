<?php

namespace App\Http\Controllers;

use Framework\View;

/**
 * Contains controller methods for route and each subroutes of account.
 */
class AccountController implements Controller
{
    /**
     * Controls the main page of account.
     *
     * @return void
     */
    public function index(): void
    {
        \Framework\Session::redirectIfNotLogged();

        if (\Framework\Session::get('name') === false)
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);

        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        }

        View::generate('account.php', 'template.php');
    }
}
