<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middlewares\NoCacheMiddleware;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\RaidController;

// ユーザー一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('users', [UserController::class, 'index'])
    ->name('index');

// 貢献度情報
Route::middleware(NoCacheMiddleware::class)
    ->get('users/showRaidPoints', [UserController::class, 'showRaidPoints'])
    ->name('showRaidPoints');

// 特定のユーザー情報一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('users/{user_id}', [UserController::class, 'show'])
    ->name('show');

// ユーザー情報更新
Route::middleware(NoCacheMiddleware::class)
    ->post('users/update', [UserController::class, 'update'])
    ->middleware('auth:sanctum')
    ->name('update');

// ユーザー追加
Route::middleware(NoCacheMiddleware::class)
    ->post('users/addUser', [UserController::class, 'addUser'])
    ->middleware('auth:sanctum')
    ->name('addUser');

/*// アイテム一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('items', [ItemController::class, 'show'])
    ->name('show');

// アイテム追加
Route::middleware(NoCacheMiddleware::class)
    ->post('items/addItem', [ItemController::class, 'addItem'])
    ->name('addItem');

// 所持アイテム一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('users/items/{user_id}', [UserController::class, 'userItem'])
    ->name('userItem');

// 所持アイテム情報更新
Route::middleware(NoCacheMiddleware::class)
    ->post('users/userItemUpdate/{item_id}', [UserController::class, 'userItemUpdate'])
    ->name('userItemUpdate');

// 所持アイテム情報更新
Route::middleware(NoCacheMiddleware::class)
    ->post('users/addUserItem', [UserController::class, 'addUserItem'])
    ->name('addUserItem');

// マスターメール一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('mails', [MailController::class, 'index'])
    ->name('index');

// メール追加
Route::middleware(NoCacheMiddleware::class)
    ->post('mails/addMail', [MailController::class, 'addMail'])
    ->name('addMail');*/

// ユーザー登録
Route::middleware(NoCacheMiddleware::class)
    ->post('users/store', [UserController::class, 'store'])
    ->name('storeUser');

// ステージ情報取得
Route::middleware(NoCacheMiddleware::class)
    ->get('stages', [StageController::class, 'index'])
    ->name('index');

// ユーザーがステージクリアした
Route::middleware(NoCacheMiddleware::class)
    ->post('stages/store', [StageController::class, 'store'])
    ->name('storeStage');

// ユーザーステージ一覧
Route::middleware(NoCacheMiddleware::class)
    ->get('stages/{user_id}', [StageController::class, 'showStage'])
    ->name('showStage');

// レイドボス情報
Route::middleware(NoCacheMiddleware::class)
    ->get('raids/showRaidBoss', [RaidController::class, 'showRaidBoss'])
    ->name('showRaidBoss');

// レイドボス情報更新
Route::middleware(NoCacheMiddleware::class)
    ->post('raids/raidBossUpdate', [RaidController::class, 'raidBossUpdate'])
    ->name('raidBossUpdate');
