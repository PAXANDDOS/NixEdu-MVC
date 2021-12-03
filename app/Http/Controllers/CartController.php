<?php

namespace App\Http\Controllers;

use Framework\View;

class CartController extends Controller
{
    public function index(): void
    {
        View::generate('cart.php', 'template.php');
    }
}
