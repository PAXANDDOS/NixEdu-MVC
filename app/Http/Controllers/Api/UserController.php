<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

/**
 * API methods for users
 */
class UserController extends Controller
{
    /**
     * Shows all users.
     *
     * @return void
     */
    public function index(): void
    {
        echo self::json(User::getAll());
    }

    /**
     * Shows user by its ID.
     *
     * @param int $id ID of the user.
     * @return void
     */
    public function show($id): void
    {
        echo self::json(User::findOne($id));
    }
}
