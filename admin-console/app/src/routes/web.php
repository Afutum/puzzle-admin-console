<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PersonalItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');

Route::post('auths/dologin', [AuthController::class, 'dologin']);

Route::get('auths/dologout', [AuthController::class, 'dologout'])->name('dologout');

//Route::post('accounts/player', [PlayerController::class, 'player']);

Route::get('accounts/showPlayer', [PlayerController::class, 'showPlayer']);

Route::get('accounts/showItem', [ItemController::class, 'showItem']);

Route::get('accounts/showPersonalItem', [PersonalItemController::class, 'showPersonalItem']);

Route::get('accounts/index/{account_id?}', [AccountController::class, 'index']);
