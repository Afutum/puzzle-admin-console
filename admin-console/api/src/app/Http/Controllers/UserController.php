<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserItemResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min_level' => ['required', 'int'],
            'max_level' => ['required', 'int']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $users = User::where('level', '>', $request['min_level'])
            ->where('level', '<', $request['max_level'])
            ->get();

        // 複数レコードのときはcollection
        return response()->json(UserResource::collection($users));
    }

    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        /*$response = [
            'datail' => UserResource::make($user)
        ];*/
        return response()->json(UserResource::make($user));
    }

    public function userItem(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        return response()->json(UserItemResource::collection($user->items));
    }
}
