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
    <header class="header">
        <div class="header-container">
            <div class="hamburger-menu">
                <input type="checkbox" id="menu-button_check">
                <label for="menu-button_check" class="menu-button"><span></span></label>
                @auth
                    <div class="menu-content">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Logout</button>
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('mypage') }}">Mypage</a>
                            </li>
                        </ul>
                    </div>
                @endauth
                @guest
                    <div class="menu-content">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Registration</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
            <div class="logo">
                <a href="{{ route('index') }}">Rese</a>
            </div>
            <nav class="navigation">
                <ul>
                    <li class="dropdown">
                        <!-- 選択されたエリアを表示 -->
                        <a href="#" class="dropdown-button">{{ $selectedArea->name ?? 'All area' }}</a>
                        <div class="dropdown-content">
                            <a href="{{ route('index') }}">All area</a>
                            @foreach ($areas ?? [] as $area)
                                <a href="{{ route('shop.area', ['id' => $area->id]) }}">{{ $area->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="dropdown">
                        <!-- 選択されたジャンルを表示 -->
                        <a href="#" class="dropdown-button">{{ $selectedGenre->name ?? 'All genre' }}</a>
                        <div class="dropdown-content">
                            <a href="{{ route('index') }}">All genre</a>
                            @foreach ($genres ?? [] as $genre)
                                <a href="{{ route('shop.genre', ['id' => $genre->id]) }}">{{ $genre->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <!-- 検索フォーム -->
                    <li>
                        <form class="search-form" action="{{ route('shops.search') }}" method="GET">
                            <label for="search" class="sr-only">Search</label>
                            <input type="search" name="query" id="search" placeholder="Search...">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
