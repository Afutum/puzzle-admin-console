<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middlewares\NoCacheMiddleware;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;

// ユーザー一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('users', [UserController::class, 'index'])
    ->name('index');

// 特定のユーザー情報一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('users/{user_id}', [UserController::class, 'show'])
    ->name('show');

// ユーザー情報更新
Route::middleware(NoCacheMiddleware::class)
    ->post('users/update', [UserController::class, 'update'])
    ->name('update');

// アイテム一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('items', [ItemController::class, 'show'])
    ->name('show');

// 所持アイテム一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('users/items/{user_id}', [UserController::class, 'userItem'])
    ->name('userItem');

// マスターメール一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('index');
