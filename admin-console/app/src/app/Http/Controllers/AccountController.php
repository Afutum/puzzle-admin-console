<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class AccountController extends Controller
{
    // アカウント一覧を表示する
    public function index(Request $request)
    {
        $accounts =
            Account::All();

        return view('accounts/index', ['accounts' => $accounts]);

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

        //$title = 'アカウント一覧';

        // カンマ区切りで、複数のパラメータを渡せる
        //return view('accounts/index', ['title' => $title, 'accounts' => $data]);
    }

    public function login(Request $request)
    {


        return view('accounts/login');
    }
}
