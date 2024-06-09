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
            <div class="logo">
                <a href="/">Rese</a>
            </div>
            <nav class="navigation">
                <ul>
                    <li class="dropdown">
                        <a href="#" class="dropdown-button">All area</a>
                        <div class="dropdown-content">
                            @foreach ($areas as $area)
                                <a href="{{ route('shop.area', ['id' => $area->id]) }}">{{ $area->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-button">All genre</a>
                        <div class="dropdown-content">
                            @foreach ($genres as $genre)
                                <a href="{{ route('shop.genre', ['id' => $genre->id]) }}">{{ $genre->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li><a href="#">Search</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
