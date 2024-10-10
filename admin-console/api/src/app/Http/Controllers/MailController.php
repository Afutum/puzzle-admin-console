<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Item;
use App\Models\Mail;
use App\Models\userMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    // メールの一覧を取得
    public function index()
    {
        $mail = Mail::all();
        return response()->json(MailResource::collection($mail));
    }

    // メール追加
    public function addMail(Request $request)
    {
        $request->validate([
            'text' => ['required', 'string'],
            'item_id' => ['required', 'integer'],
            'item_cnt' => ['required', 'integer']
        ]);

        Mail::create([
            'text' => $request->text,
            'item_id' => $request->item_id,
            'item_cnt' => $request->item_cnt
        ]);
    }
}
