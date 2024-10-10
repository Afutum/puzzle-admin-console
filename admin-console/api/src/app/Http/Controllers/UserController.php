<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserItemResource;
use App\Http\Resources\UserResource;
use App\Models\PersonalItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // 特定レベルのユーザーを絞り込んで取得
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min_contribution' => ['required', 'int'],
            'max_contribution' => ['required', 'int']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $users = User::where('contribution', '>', $request['min_contribution'])
            ->where('contribution', '<', $request['max_contribution'])
            ->get();

        // 複数レコードのときはcollection
        return response()->json(UserResource::collection($users));
    }

    // すべてのユーザーを取得
    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        /*$response = [
            'datail' => UserResource::make($user)
        ];*/
        return response()->json(UserResource::make($user));
    }

    // 特定のユーザーが所持しているアイテムの情報を取得
    public function userItem(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        return response()->json(UserItemResource::collection($user->items));
    }

    // ユーザーの情報を更新
    public function update(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->raid_points += $request->raid_points;
        $user->save();

        return response()->json();
    }

    // ユーザーが所持しているアイテムの情報を更新
    public function userItemUpdate(Request $request)
    {
        $request->validate([
            'personal_item' => ['required', 'int', 'min:0']
        ]);

        $userItem = PersonalItem::findOrFail($request->item_id);
        $userItem->personal_item = $request->personal_item;
        $userItem->save();

        return response()->json();
    }

    // ユーザーの追加
    public function addUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'contribution' => 0
        ]);
    }

    // ユーザーが所持しているアイテムの情報の追加
    public function addUserItem(Request $request)
    {
        $request->validate([
            'personal_item' => ['required', 'int', 'max:4']
        ]);

        PersonalItem::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'personal_item' => $request->personal_item
        ]);
    }

    // ユーザー登録
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        $user = User::create(
            [
                'name' => $request['name'],
                'contribution' => 0
            ]
        );

        // APIトークンを発行する
        $token = $user->createToken($request->name)->plainTextToken;

        // ユーザーIDとAPIトークンを返す
        return response()->json(['user_id' => $user->id, 'token' => $token]);
    }

    // 貢献度情報取得
    public function showRaidPoints()
    {
        $user = User::orderByDesc('raid_points')
            ->limit(5)
            ->get();

        return response()->json($user);
    }
}
