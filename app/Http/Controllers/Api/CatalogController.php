<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

/**
 * API methods for catalog
 */
class CatalogController extends Controller
{
    /**
     * Shows the entire catalog.
     *
     * @return void
     */
    public function index(): void
    {
        self::response('json', Product::getAll());
    }

    /**
     * Shows product by ID.
     *
     * @param int $id ID of the product.
     * @return void
     */
    public function show(int $id): void
    {
        self::response('json', Product::findOne($id));
    }
}
