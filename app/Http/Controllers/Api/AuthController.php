<?php

namespace App\Http\Controllers\Api;

/**
 * API methods for authorization
 */
class AuthController extends Controller
{
    /**
     * Controls the sign in page.
     *
     * @return void
     */
    public function signIn(): void
    {
        echo 'signin';
    }

    /**
     * Controls the sign up page.
     *
     * @return void
     */
    public function signUp(): void
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
        echo 'signout';
    }
}
