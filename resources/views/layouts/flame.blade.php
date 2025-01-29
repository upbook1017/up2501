<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--スマホ用-->
    <title>よくある掲示板サイト</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/top" class="number_0">TOP</a></li><!--href="アドレス名(web.php)"を入れること。-->
                <li><a href="/board/info" class="number_0">INFORMATION</a></li>
            </ul>
        </nav>
    </header>

    <div>
        @yield('content')
    </div>
    <footer>
        <p>upbook1017_up2501</p>
    </footer>
</body>

</html>
