<?php

namespace App\Http\Controllers;

use Framework\View;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(): void
    {
        $products = Product::getAll();
        View::generate('catalog.php', 'template.php', array(
            'products' => $products
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
