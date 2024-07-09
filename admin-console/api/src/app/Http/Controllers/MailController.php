<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Models\Item;
use App\Models\Mail;
use App\Models\userMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        $mail = Mail::all();
        return response()->json(MailResource::collection($mail));
    }
}
