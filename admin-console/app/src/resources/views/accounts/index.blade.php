@extends('layouts.app')
@section('title','アカウント一覧')
@section('body')
    @section('userList','nav-link px-2 link-secondary')
    @section('userLeg','nav-link px-2')
    @section('player','nav-link px-2')
    @section('item','nav-link px-2')
    @section('personalItem','nav-link px-2')

    <h1>■アカウント一覧</h1>
    @if(!empty($accounts))
        {{$accounts->onEachSide(1)->links()}}
    @endif
    <table class="table table-hover" id="table">
        <tr>
            <th>名前</th>
            <th>パスワード</th>
            <th>操作</th>
        </tr>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account['name']}}</td>
                <td>{{$account['password']}}</td>
                <td>
                    <form method="post" action="{{route('accounts.confDestroy')}}">
                        @csrf
                        <button type="submit">削除</button>
                        <input type="hidden" name="id" value={{$account['id']}}>
                    </form>
                    <form method="post" action="{{route('accounts.disPassUpdate')}}">
                        @csrf
                        <button type="submit">更新</button>
                        <input type="hidden" name="id" value={{$account['id']}}>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
