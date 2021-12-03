<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;

return [
    '/' => [HomeController::class, 'MainAction'],
    '/catalog' => [CatalogController::class, 'MainAction'],
    '/catalog/{name}' => [CatalogController::class, 'ProductPage'],
    '/signin' => [SigninController::class, 'MainAction'],
    '/account' => [AccountController::class, 'MainAction'],
    '/cart' => [CartController::class, 'MainAction'],
    '/404' => [ErrorController::class, 'MainAction'],
];
