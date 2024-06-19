<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('accounts/login');
    }

    public function dologin(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:4', 'max:20'],
            'password' => ['required']
        ]);

        $accounts = Account::where('name', '=', $request['name'])->get();
        if ($accounts->count() > 0) {
            Debugbar::info($request['password']);
            Debugbar::info($accounts[0]['password']);
            if (Hash::check($request['password'], $accounts[0]['password'])) {
                // 名前とパスが一致している場合
                // セッションに指定のキーで値を保存
                $request->session()->put('login', true);

                return redirect('accounts/index');
            }
        }

        return redirect()->route('login', ['error' => 'invalid']);
    }

    public function dologout(Request $request)
    {
        Debugbar::info('jijiijijiji');

        // セッションから指定したデータを削除
        $request->session()->flush();

        // ログイン画面にリダイレクトする
        return view('accounts/login');
    }
}
