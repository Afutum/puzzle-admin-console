<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PersonalItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegAccountController;
use App\Http\Middleware\AuthMiddleware;


// ログイン画面
Route::get('/', [AuthController::class, 'login'])->name('login');

// ログイン処理
Route::post('auths/dologin', [AuthController::class, 'dologin']);

// ログアウト処理
Route::get('auths/dologout', [AuthController::class, 'dologout'])->name('dologout');

// プレイヤー一覧表示処理
Route::get('accounts/showPlayer', [UserController::class, 'showPlayer']);

// アイテム一覧表示処理
Route::get('accounts/showItem', [ItemController::class, 'showItem']);

// アイテム所持数一覧表示処理
Route::get('accounts/showPersonalItem', [PersonalItemController::class, 'showPersonalItem']);

// アカウント登録画面
/*Route::get('accounts/create', [AccountController::class, 'create'])->name('accounts.create');

// アカウント登録処理
Route::post('accounts/store', [AccountController::class, 'store'])->name('accounts.store');*/

// 削除確認画面表示処理
Route::post('accounts/confDestroy', [AccountController::class, 'confDestroy'])->name('accounts.confDestroy');

// 削除完了画面表示処理
Route::post('accounts/successDestroy', [AccountController::class, 'successDestroy'])->name('accounts.successDestroy');

// ユーザー一覧
Route::get('accounts/index/{account_id?}', [AccountController::class, 'index'])->name('accounts.index');

ROute::prefix('accounts')->name('accounts.')->controller(AccountController::class)
    ->middleware(AuthMiddleware::class)->group(function () {
        Route::get('/', 'index')->name('index');                              // accounts.index   　 一覧表示画面
        Route::get('create', 'create')->name('create');                       // accounts.create  　 登録画面
        Route::post('store', 'store')->name('store');                         // accounts.store   　 登録処理
        Route::post('destroy', 'destroy')->name('destroy');                   // accounts.destroy 　 削除処理
        Route::post('disPassUpdate', 'disPassUpdate')->name('disPassUpdate'); // accounts.update     更新情報入力画面
        Route::post('passUpdate', 'passUpdate')->name('passUpdate');          // accounts.passUpdate 更新処理
    });
