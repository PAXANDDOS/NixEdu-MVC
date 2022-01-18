<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Session;

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
            self::response('json', ["message" => "Invalid credentials."], 400);
        if ($user[0]->password !== hash('md5', $data->password))
            self::response('json', ["message" => "Invalid password."], 403);
        if ($session = Session::findWhere('user_id', $user[0]->id))
            Session::destroy($session[0]->token);

        $token = self::attempt($data->password);
        Session::create([
            'token' => $token,
            'user_id' => $user[0]->id,
        ]);

        self::response('json', [
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
        echo 'signup';
    }

    /**
     * Controls the sign up page.
     *
     * @return void
     */
    public function signOut(): void
    {
        $token = explode('Bearer ', apache_request_headers()['Authorization'])[1];
        if (!Session::findOne($token))
            self::response('json', [
                "message" => 'Invalid token.'
            ]);
        Session::destroy($token);
        self::response('json', [
            "message" => 'Successfully signed out.'
        ]);
    }
}
