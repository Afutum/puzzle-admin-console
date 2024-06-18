<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class AccountController extends Controller
{
    // アカウント一覧を表示する
    public function index(Request $request)
    {
        $data = [
            [
                'name' => 'jobi',
                'pass' => 'jobi',
            ],
            [
                'name' => 'miyake',
                'pass' => '$ss$uufeip',
            ]
        ];

        //dd($request->account_id);

        /*DebugBar::info('あいうえお');
        DebugBar::error('エラーだよ');

        // セッションに指定のキーで値を保存
        $request->session()->put('aaa', 5);

        // セッションから指定のキーの値を取得
        $value = $request->session()->get('aaa');

        // セッションから指定したデータを削除
        //$request->session()->forget('aaa');

        // セッションの全てのデータを削除
        $request->session()->flush();*/

        // セッションに指定したキーが存在するか
        /*if ($request->session()->exists('aaa')) {
            var_dump($request['aaa']);
        }*/

        $title = 'アカウント一覧';

        // カンマ区切りで、複数のパラメータを渡せる
        return view('accounts/index', ['title' => $title, 'accounts' => $data]);
    }
    
    public function login(Request $request)
    {
        return view('accounts/login');
    }


    //******************
    // ログイン処理
    //******************
    public function dologin(Request $request)
    {
        if ($request['name'] === 'jobi' && $request['pass'] === 'jobi') {
            // 名前とパスが一致している場合
            // セッションに指定のキーで値を保存
            $request->session()->put('login', true);

            return redirect('accounts/index');
        } else {
            // 一致してない場合
            return redirect('/')->with(['errors' => ['ユーザー名・パスワードが間違っています。']]);
        }
    }

    //********************
    // ログアウト処理
    //********************
    public function dologout(Request $request)
    {
        // セッションから指定したデータを削除
        $request->session()->forget('login');

        // ログイン画面にリダイレクトする
        return redirect('/');
    }
}
