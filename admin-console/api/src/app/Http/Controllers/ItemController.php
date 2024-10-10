<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {

    }

    // アイテム一覧を取得
    public function show(Request $request)
    {
        $item = Item::all();
        return response()->json(ItemResource::collection($item));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'item_name' => ['required'],
            'type' => ['required', 'string'],
            'effect_num' => ['required', 'integer'],
            'explanation' => ['required', 'string']
        ]);

        Item::create([
            'item_name' => $request->item_name,
            'type' => $request->type,
            'effect_num' => $request->effect_num,
            'explanation' => $request->explanation
        ]);
    }
}
