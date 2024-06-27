<html lang="ja">
<head>
    <title>ユーザー登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<form method="post" action="{{route('accounts.store')}}">
    @csrf

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
                <li><a href="{{route('accounts.create')}}" class="nav-link px-2  link-secondary">ユーザー登録</a></li>
                <li><a href="showPlayer" class="nav-link px-2">プレイヤー一覧</a></li>
                <li><a href="showItem" class="nav-link px-2">アイテム一覧</a></li>
                <li><a href="showPersonalItem" class="nav-link px-2">所持アイテム一覧</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-danger me-2"
                        onclick="location.href='{{url("/auths/dologout")}}'">ログアウト
                </button>
            </div>
        </header>
    </div>
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
         id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">ユーザー登録</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form class="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="floatingInput" name="name">
                            <label for="floatingInput">ユーザー名</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword"
                                   placeholder="Password" name="password">
                            <label for="floatingPassword">パスワード</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword"
                                   placeholder="Password" name="password_confirmation">
                            <label for="floatingPassword">パスワード(再確認)</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">登録</button>
                        <input type="hidden" name="action" value="doLogin">
                    </form>
                    @if(!empty($success))
                        <ul>
                            <li>{{$success}}</li>
                        </ul>
                    @endif
                    @if(!empty($error))
                        <ul>
                            <li class="text-danger">その名前はすでに使われています</li>
                        </ul>
                    @endif
                    @if(!empty($errors))
                            <?php \Barryvdh\Debugbar\Facades\Debugbar::info($errors); ?>
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-danger">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>
