<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FashionablyLate')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @if(Route::currentRouteName() === 'login')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @elseif(Route::currentRouteName() === 'register')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @endif
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>

        <div class="header-btn">
            @guest
            @if(Route::currentRouteName() === 'login')
            <a href="{{ route('register') }}"><button type="button">Register</button></a>
            @elseif(Route::currentRouteName() === 'register')
            <a href="{{ route('login') }}"><button type="button">Login</button></a>
            @endif
            @else
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @endguest
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>