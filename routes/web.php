<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;

return [
    '/' => [HomeController::class, 'index'],
    '/catalog' => [CatalogController::class, 'index'],
    '/catalog/{name}' => [CatalogController::class, 'ProductPage'],
    '/signin' => [SigninController::class, 'index'],
    '/account' => [AccountController::class, 'index'],
    '/cart' => [CartController::class, 'index'],
    '/404' => [ErrorController::class, 'index'],
];
