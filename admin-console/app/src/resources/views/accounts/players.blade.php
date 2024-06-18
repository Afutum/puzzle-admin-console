<html lang="ja">
<head>
    <title>プレイヤー一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2">ユーザー一覧</a></li>
            <li><a href="{{url('accounts/showPlayer')}}" class="nav-link px-2 link-secondary">プレイヤー一覧</a></li>
            <li><a href="{{url('accounts/showItem')}}" class="nav-link px-2">アイテム一覧</a></li>
            <li><a href="{{url('accounts/showPersonalItem')}}" class="nav-link px-2">所持アイテム一覧</a>
        </ul>

        <div class="col-md-3 text-end">
            <button onclick="location.href='dologout'">ログアウト</button>
        </div>
    </header>
</div>
<form method="post" action="{{url('accounts/player')}}">
    <input type="text" name="userName" id="userName">
    <input type="button" class="btn btn-primary" id="button" value="検索">
    <input type="hidden" name="action" value="searchUser">
</form>
<button onclick="location.href='./?action=player'">一覧に戻す</button>
<h3>■プレイヤー一覧■</h3>
<table class="table table-hover" id="table">
    @foreach($players as $player)
        <tr>
            <td>{{$player['id']}}</td>
            <td>{{$player['name']}}</td>
            <td>{{$player['level']}}</td>
            <td>{{$player['exp']}}</td>
            <td>{{$player['life']}}</td>
        </tr>
    @endforeach
</table>
