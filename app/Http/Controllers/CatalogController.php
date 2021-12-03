<?php

namespace App\Http\Controllers;

use Framework\View;
use App\Models\Product;

class CatalogController extends Controller
{
    public function MainAction()
    {
        $products = Product::all();
        $cards = null;
        foreach ($products as $value => $key) {
            $cards = $cards . '<a href="/catalog/' . $key['id'] . '">' .
                '<div class="single">' .
                '<img src="' . $key['image'] . '">' .
                '<h3>' . $key['name'] . '</h3>' .
                '<span>' . $key['price'] . '</span>' .
                '<label>BUY</label>' .
                '</div>' .
                '</a>';
        }

        View::generate('catalog.php', 'template.php', array(
            'cards' => $cards
        ));
    }

    public function ProductPage($id)
    {
        $product = Product::find($id);
        View::generate('product.php', 'template.php', array(
            'product' => $product
        ));
    }
}
