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
        self::response('json', User::getAll());
    }

    /**
     * Shows user by its ID.
     *
     * @param int $id ID of the user.
     * @return void
     */
    public function show(int $id): void
    {
        self::response('json', User::findOne($id));
    }
}
