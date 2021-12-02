<?php

class AccountController extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        if (!isset($_SESSION['name']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
        $this->view->generate('account_view.php', 'template_view.php');
    }

    public function action_logout()
    {
        session_destroy();
        header("Location: http://" . $_SERVER["HTTP_HOST"] . "/signin", false, 303);
    }
}
