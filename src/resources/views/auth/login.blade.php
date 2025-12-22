<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
        <div class="login-btn">
            <a href="{{ route('register') }}">
                <button type="button">Register</button>
            </a>
        </div>
    </header>

    <h2>Login</h2>
    <form class="form" action="{{ route('login') }}" method="post" novalidate>
        @csrf


        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" placeholder="例:password">
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        @if(session('login_error'))
        <div class="error">{{ session('login_error') }}</div>
        @endif

        <button type="submit">ログイン</button>

    </form>
</body>

</html>