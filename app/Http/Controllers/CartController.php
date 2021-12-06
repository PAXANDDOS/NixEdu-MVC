<?php

namespace App\Http\Controllers;

use Framework\View;

/**
 * Contains controller methods for route and each subroute of cart.
 */
class CartController implements Controller
{
    /**
     * Controls the main page of cart.
     *
     * @return void
     */
    public function index(): void
    {
        View::generate('cart.php', 'template.php');
    }
}
