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

    public function show(Request $request)
    {
        $item = Item::all();
        return response()->json(ItemResource::collection($item));
    }
}
