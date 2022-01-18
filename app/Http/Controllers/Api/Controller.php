<?php

namespace App\Http\Controllers\Api;

class Controller
{
    /**
     * Creates and sends an HTTP response.
     *
     * @param string $type Type of the response (e.g. json, form-data)
     * @param mixed $data Payload of the response.
     * @param int $status Status code of the response.
     * @return void
     */
    protected static function response(string $type, mixed $data, int $status = 200): void
    {
        http_response_code($status);
        switch (trim($type)) {
            case 'json':
                header('Content-Type: application/json; charset=utf-8');
                $response = json_encode($data);
                break;
            case 'form-data':
                header('Content-Type: multipart/form-data; charset=utf-8');
                break;
            case 'form-url':
                header('Content-Type: application/x-www-form-urlencoded; charset=utf-8');
                break;
            case 'xml':
                header('Content-Type: application/xml; charset=utf-8');
                break;
            case 'yaml':
                header('Content-Type: text/yaml; charset=utf-8');
                break;
            case 'edn':
                header('Content-Type: application/edn; charset=utf-8');
                break;
            case 'plain':
                header('Content-Type: text/plain; charset=utf-8');
                break;
            case 'file':
                header('Content-Type: application/octet-stream; charset=utf-8');
                break;
        }

        exit($response);
    }

    /**
     * Creates a random unified token based on the sample.
     *
     * @param string $sample Sample to unify the token.
     * @param int $length Token length.
     * @return string Unified generated token.
     */
    protected static function attempt(string $sample, int $length = 64): string
    {
        $char = '._0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' . $sample;
        $char = str_shuffle($char);
        $charlen = strlen($char);
        $token = '';
        for ($i = 0; $i < $length; $i++)
            $token .= $char[rand(0, $charlen - 1)];
        return $token;
    }
}
