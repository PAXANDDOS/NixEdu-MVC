<?php

namespace App\Http\Controllers;

use Framework\View;

class HomeController extends Controller
{
    public function MainAction()
    {
        View::generate('home.php', 'template.php');
    }
}
