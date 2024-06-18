<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // プレイヤー一覧表示処理
    public function showPlayer(Request $request)
    {
        // プレイヤーのデータを連想配列で登録
        $players = [
            [
                'id' => 1,
                'name' => 'jobi',
                'level' => 10,
                'exp' => 100,
                'life' => 3,
            ],
            [
                'id' => 2,
                'name' => 'chiba',
                'level' => 33,
                'exp' => 3830,
                'life' => 0,
            ],
            [
                'id' => 3,
                'name' => 'hoge',
                'level' => 8,
                'exp' => 63,
                'life' => 5,
            ]
        ];

        DebugBar::error('エラーだよ');

        // sessionにloginが含まれていたら
        if ($request->session()->exists('login')) {
            // プレイヤーの情報を渡してviewを表示
            return view('accounts/players', ['players' => $players]);
        } else {
            // 含まれていなかったらログイン画面を表示
            return redirect('/');
        }
    }
}
