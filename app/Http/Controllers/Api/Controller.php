<?php

namespace App\Http\Controllers\Api;

class Controller
{
    /**
     * Converts given data and prepares the response for JSON.
     *
     * @return string JSON encoded data.
     */
    protected static function json($data): string
    {
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($data);
    }
}
