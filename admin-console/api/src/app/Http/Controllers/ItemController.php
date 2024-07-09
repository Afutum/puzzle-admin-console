<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {

    }

    public function show(Request $request)
    {
        $item = item::all();
        return response()->json(ItemResource::collection($item));
    }
}
