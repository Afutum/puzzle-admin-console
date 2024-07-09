<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middlewares\NoCacheMiddleware;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;

Route::middleware(NoCacheMiddleware::class)
    ->get('users/items/{user_id}', [UserController::class, 'userItem'])
    ->name('userItem');

Route::middleware(NoCacheMiddleware::class)
    ->get('users/{user_id}', [UserController::class, 'show'])
    ->name('show');

Route::middleware(NoCacheMiddleware::class)
    ->get('users', [UserController::class, 'index'])
    ->name('index');

Route::middleware(NoCacheMiddleware::class)
    ->get('items', [ItemController::class, 'show'])
    ->name('show');

Route::middleware(NoCacheMiddleware::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('index');
