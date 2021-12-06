<?php

namespace App\Http\Controllers;

use Framework\View;
use App\Models\Product;

/**
 * Contains controller methods for route and each subroute of cart.
 */
class CatalogController implements Controller
{
    /**
     * Controls the main page of catalog.
     *
     * @return void
     */
    public function index(): void
    {
        $products = Product::getAll();
        View::generate('catalog.php', 'template.php', [
            'products' => $products
        ]);
    }

    /**
     * Controls the product page.
     *
     * @param int $id ID of the product.
     * @return void
     */
    public function productPage(int $id): void
    {
        $product = Product::findOne($id);
        View::generate('product.php', 'template.php', [
            'product' => $product
        ]);
    }
}
