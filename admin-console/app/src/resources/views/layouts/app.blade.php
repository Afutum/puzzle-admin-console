<html lang="ja">
<head>
    <title>@yield('title')</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"
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
            <li><a href="{{route('accounts.index')}}" class="@yield('userList')">アカウント一覧</a></li>
            <li><a href="{{route('accounts.create')}}" class="@yield('userLeg')">アカウント登録</a></li>
            <li><a href="{{route('user.showPlayer')}}" class="@yield('player')">プレイヤー一覧</a></li>
            <li><a href="{{route('item.showItem')}}" class="@yield('item')">アイテム一覧</a></li>
            <li><a href="{{route('personalItem.showPersonalItem')}}"
                   class="@yield('personalItem')">所持アイテム一覧</a>
            </li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-danger me-2"
                    onclick="location.href='{{route('dologout')}}'">ログアウト
            </button>
        </div>
    </header>
</div>
@yield('body')
</body>
</html>
