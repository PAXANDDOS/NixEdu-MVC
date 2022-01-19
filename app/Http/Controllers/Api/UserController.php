<?php

namespace App\Http\Controllers\Api;

use Framework\API;
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
        API::response('json', User::getAll());
    }

    /**
     * Shows user by its ID.
     *
     * @param int $id ID of the user.
     * @return void
     */
    public function show(int $id): void
    {
        API::response('json', User::findOne($id));
    }
}
