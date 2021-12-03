<?php

namespace App\Http\Controllers;

use Framework\View;

class CartController extends Controller
{
    public function MainAction()
    {
        View::generate('cart.php', 'template.php');
    }
}
