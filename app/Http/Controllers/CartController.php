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
        \Framework\Session::redirectIfNotAuthorized();

        $products = [];
        foreach (\Framework\Session::get('cart') as $id)
            $products[] = \App\Models\Product::findOne($id);

        if (isset($_POST['remove'])) {
            $cart = \Framework\Session::get('cart');
            if (($key = array_search($_POST['removeItem'], $cart)) !== false)
                unset($cart[$key]);
            \Framework\Session::create('cart', $cart);
            header("Refresh:0");
        }

        View::generate('cart.php', 'template.php', [
            'products' => $products
        ]);
    }
}
