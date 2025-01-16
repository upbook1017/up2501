<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>よくある掲示板サイト</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <header id="page">
        <nav>
            <ul>
                <li><a href="home">TOP</a></li><!--href="アドレス名(web.php)"を入れること。-->
                <li><a href="info.blade.php">INFORMATION</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>
    <footer>
        <p>upbook1017_up2501</p>
    </footer>
</body>

</html>
