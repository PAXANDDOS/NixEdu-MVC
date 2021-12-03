<?php

namespace App\Http\Controllers;

use Framework\View;

class HomeController extends Controller
{
    public function index(): void
    {
        View::generate('home.php', 'template.php');
    }
}
