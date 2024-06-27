<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // アイテム一覧表示処理
    public function showItem(Request $request)
    {
        // sessionにloginが含まれていたら
        if ($request->session()->exists('login')) {
            // データを渡してviewを表示
            return view('items/index');
        } else {
            // 含まれていなかったらログイン画面を表示
            return redirect('/');
        }
    }
}
