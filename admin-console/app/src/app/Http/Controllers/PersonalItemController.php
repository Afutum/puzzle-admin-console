<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalItemController extends Controller
{
    public function showPersonalItem(Request $request)
    {
        $personalItem = [
            [
                'id' => 1,
                'player_name' => 'jobi',
                'item_name' => '回復薬',
                'personal_item' => 15,
            ],
            [
                'id' => 1,
                'player_name' => 'jobi',
                'item_name' => '超回復薬',
                'personal_item' => 1,
            ],
            [
                'id' => 2,
                'player_name' => 'chiba',
                'item_name' => '回復薬',
                'personal_item' => 5,
            ],
            [
                'id' => 2,
                'player_name' => 'chiba',
                'item_name' => '超回復薬',
                'personal_item' => 3,
            ],
            [
                'id' => 3,
                'player_name' => 'hoge',
                'item_name' => '回復薬',
                'personal_item' => 9,
            ],
            [
                'id' => 3,
                'player_name' => 'hoge',
                'item_name' => '超回復薬',
                'personal_item' => 2,
            ],
        ];

        if ($request->session()->exists('login')) {
            return view('accounts/personalItems', ['items' => $personalItem]);
        } else {
            return redirect('/');
        }
    }
}
