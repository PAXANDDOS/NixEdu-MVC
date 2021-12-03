<?php

namespace App\Http\Controllers;

use Framework\View;

class ErrorController extends Controller
{
    public function MainAction()
    {
        View::generate('404.php', 'template.php');
    }
}
