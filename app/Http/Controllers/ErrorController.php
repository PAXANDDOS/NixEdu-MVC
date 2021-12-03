<?php

namespace App\Http\Controllers;

use Framework\View;

class ErrorController extends Controller
{
    public function index(): void
    {
        if (isset($_POST['back']))
            header("Location: http://" . $_SERVER["HTTP_HOST"] . "/", false, 303);
        View::generate('404.php', 'template.php');
    }
}
