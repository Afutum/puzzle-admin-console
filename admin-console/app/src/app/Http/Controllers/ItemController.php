<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // アイテム一覧表示処理
    public function showItem(Request $request)
    {
        // 連想配列でデータを登録
        $items = [
            [
                'id' => 1,
                'item_name' => '回復薬',
                'type' => '消耗品',
                'effect_num' => 3,
                'explanation' => 'ライフを回復する',
            ],
            [
                'id' => 2,
                'item_name' => '超回復薬',
                'type' => '消耗品',
                'effect_num' => 5,
                'explanation' => 'ライフを超回復する',
            ],
            [
                'id' => 3,
                'item_name' => '復活の羽',
                'type' => '消耗品',
                'effect_num' => 1,
                'explanation' => '1度死んでも復活する',
            ],
            [
                'id' => 4,
                'item_name' => 'しあわせのくつ',
                'type' => '装備品',
                'effect_num' => 10,
                'explanation' => 'クリア毎に経験値が加算',
            ]
        ];

        // sessionにloginが含まれていたら
        if ($request->session()->exists('login')) {
            // データを渡してviewを表示
            return view('accounts/items', ['items' => $items]);
        } else {
            // 含まれていなかったらログイン画面を表示
            return redirect('/');
        }
    }
}
