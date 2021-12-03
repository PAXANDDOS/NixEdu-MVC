<?php

namespace App\Http\Controllers;

use Framework\View;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(): void
    {
        $products = Product::getAll();
        $cards = null;
        foreach ($products as $value => $key) {
            $cards = $cards . '<a href="/catalog/' . $key->id . '">' .
                '<div class="single">' .
                '<img src="' . $key->image . '">' .
                '<h3>' . $key->name . '</h3>' .
                '<span>$ ' . $key->price . '</span>' .
                '<label>BUY</label>' .
                '</div>' .
                '</a>';
        }

        View::generate('catalog.php', 'template.php', array(
            'cards' => $cards
        ));
    }

    public function productPage(int $id): void
    {
        $product = Product::findOne($id);
        View::generate('product.php', 'template.php', array(
            'product' => $product
        ));
    }
}
