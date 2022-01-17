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
        echo self::json(Order::getAll());
    }

    /**
     * Shows order by ID.
     *
     * @param int $id ID of the order.
     * @return void
     */
    public function show($id): void
    {
        echo self::json(Order::findOne($id));
    }

    /**
     * Creates new order.
     *
     * @return void
     */
    public function create($data): void
    {
        echo self::json(Order::create($data));
    }

    /**
     * Deletes the order by ID.
     *
     * @return void
     */
    public function destroy($id): void
    {
        echo self::json(Order::destroy($id));
    }
}
