<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // プレイヤー一覧表示処理
    public function showPlayer(Request $request)
    {
        // テーブルからプレイヤー情報をすべて取得
        $players = User::all();

        //DebugBar::error('エラーだよ');

        // sessionにloginが含まれていたら
        if ($request->session()->exists('login')) {
            // プレイヤーの情報を渡してviewを表示
            return view('users/index', ['players' => $players]);
        } else {
            // 含まれていなかったらログイン画面を表示
            return redirect('/');
        }
    }
}
