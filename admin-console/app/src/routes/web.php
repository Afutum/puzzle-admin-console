<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PersonalItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccountController::class, 'login']);

Route::post('accounts/dologin', [AccountController::class, 'dologin']);

Route::get('accounts/dologout', [AccountController::class, 'dologout']);

//Route::post('accounts/player', [PlayerController::class, 'player']);

Route::get('accounts/showPlayer', [PlayerController::class, 'showPlayer']);

Route::get('accounts/showItem', [ItemController::class, 'showItem']);

Route::get('accounts/showPersonalItem', [PersonalItemController::class, 'showPersonalItem']);

Route::get('accounts/index/{account_id?}', [AccountController::class, 'index']);
