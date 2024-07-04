<?php

namespace App\Http\Controllers;

use App\Models\followList;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $follows = followList::select([
            'follow_lists.id',
            'users.name as user_name',
            'users.level as user_level',
            'follow_lists.created_at',
        ])
            ->join('users', 'users.id', '=', 'follow_lists.follow_user_id')
            ->get();

        return view('follow/index', ['follows' => $follows]);
    }

    // フォロー追加
    /*public function addFollow(Request $request)
    {
        followList::create([
            'user_id' => $request['id'],
            'is_received' => 0
        ]);

        return redirect()->route('user.showPlayer');
    }*/
}
