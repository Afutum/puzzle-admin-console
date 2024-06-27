<html lang="ja">
<head>
    <title>所持アイテム一覧</title>
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
            <li><a href="{{route('accounts.index')}}" class="nav-link px-2">ユーザー一覧</a></li>
            <li><a href="{{route('accounts.create')}}" class="nav-link px-2">ユーザー登録</a></li>
            <li><a href="showPlayer" class="nav-link px-2">プレイヤー一覧</a></li>
            <li><a href="showItem" class="nav-link px-2">アイテム一覧</a></li>
            <li><a href="showPersonalItem" class="nav-link px-2 link-secondary">所持アイテム一覧</a>
            </li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-danger me-2"
                    onclick="location.href='{{url("/auths/dologout")}}'">ログアウト
            </button>
        </div>
    </header>
</div>
<h3>■所持アイテム一覧■</h3>
<table class="table table-hover" id="table">
    <tr>
        <th>ID</th>
        <th>プレイヤー名</th>
        <th>アイテム名</th>
        <th>所持個数</th>
    </tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['user_name']}}</td>
            <td>{{$item['item_name']}}</td>
            <td>{{$item['personal_item']}}</td>
        </tr>
    @endforeach
</table>
