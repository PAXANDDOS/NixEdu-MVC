<?php

use App\Http\Controllers\{HomeController, AccountController, CatalogController, SigninController, CartController, ErrorController};

return [
    '/' => [HomeController::class, 'index'],
    '/catalog' => [CatalogController::class, 'index'],
    '/catalog/{name}' => [CatalogController::class, 'ProductPage'],
    '/signin' => [SigninController::class, 'index'],
    '/account' => [AccountController::class, 'index'],
    '/cart' => [CartController::class, 'index'],
    '/404' => [ErrorController::class, 'index'],
];
