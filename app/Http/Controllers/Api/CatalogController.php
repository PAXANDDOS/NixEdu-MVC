<?php

namespace App\Http\Controllers\Api;

use Framework\API;
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
        API::response('json', Product::getAll());
    }

    /**
     * Shows product by ID.
     *
     * @param int $id ID of the product.
     * @return void
     */
    public function show(int $id): void
    {
        API::response('json', Product::findOne($id));
    }
}
