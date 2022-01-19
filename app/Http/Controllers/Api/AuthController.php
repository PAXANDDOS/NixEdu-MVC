<?php

namespace App\Http\Controllers\Api;

use Framework\{API, Auth};
use App\Models\{User, Session};

/**
 * API methods for authorization
 */
class AuthController extends Controller
{
    /**
     * Controls the sign in page.
     *
     * @param mixed $data Payload of request.
     * @return void
     */
    public function signIn(mixed $data): void
    {
        if (!$user = User::findWhere('name', $data->name))
            API::response('json', ["message" => "Invalid credentials."], 400);
        if ($user[0]->password !== hash('md5', $data->password))
            API::response('json', ["message" => "Invalid password."], 403);
        if ($session = Session::findWhere('user_id', $user[0]->id))
            Session::destroy($session[0]->token);

        $token = Auth::attempt($user[0]);
        API::response('json', [
            'message' => "Signed in.",
            'cookie' => [
                'id' => $user[0]->id,
                'name' => $user[0]->name,
                'email' => $user[0]->email,
                'token' => "Bearer $token",
            ]
        ], 201);
    }

    /**
     * Controls the sign up page.
     *
     * @param mixed $data Payload of request.
     * @return void
     */
    public function signUp(mixed $data): void
    {
        if (User::findWhere('name', $data->name))
            API::response('json', ["message" => "This user name is already taken."], 400);
        if ($data->password !== $data->password_confirmation)
            API::response('json', ["message" => "Passwords did not match."], 400);

        User::create([
            "name" => $data->name,
            "email" => $data->email,
            "password" => hash("md5", $data->password)
        ]);

        API::response('json', [
            'message' => "Successfully signed up."
        ], 201);
    }

    /**
     * Controls the sign up page.
     *
     * @return void
     */
    public function signOut(): void
    {
        Session::destroy(Auth::token());
        API::response('json', [
            "message" => 'Successfully signed out.'
        ]);
    }
}
