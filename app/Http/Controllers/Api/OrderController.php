<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;

/**
 * API methods for orders
 */
class OrderController extends Controller
{
    /**
     * Shows all orders.
     *
     * @return void
     */
    public function index(): void
    {
        self::response('json', Order::getAll());
    }

    /**
     * Shows order by ID.
     *
     * @param int $id ID of the order.
     * @return void
     */
    public function show(int $id): void
    {
        self::response('json', Order::findOne($id));
    }

    /**
     * Creates new order.
     *
     * @return void
     */
    public function create($data): void
    {
        self::response('json', Order::create($data), 201);
    }

    /**
     * Deletes the order by ID.
     *
     * @return void
     */
    public function destroy(int $id): void
    {
        self::response('json', Order::destroy($id), 201);
    }
}
