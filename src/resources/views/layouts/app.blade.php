<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <script src="https://kit.fontawesome.com/f07aae9695.js" crossorigin="anonymous"></script>
    @yield('css')
</head>

<body>
    <header>
        <!-- ハンバーガーメニュー -->
        <div class="hamburger-menu">
            <input type="checkbox" id="check">
            <lavel for="check" class="hamburger">
                <span></span>
            </lavel>
            <div id="menu">
                <a href="Home"></a>
                <a href="Registration"></a>
                <a href="Login"></a>
            </div>
        </div>
        <!-- サイトタイトル -->
        <div class="logo">Rese</div>
        <!-- ナビ -->
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
