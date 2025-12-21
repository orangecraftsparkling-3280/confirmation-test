<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <header class="admin-header">
        <h1 class="logo">FashionablyLate</h1>
        <div class="login-btn">
            <a href="{{ route('login') }}">
                <button type="button">Login</button>
            </a>
        </div>
    </header>

    <h2>Register</h2>

    <form class="form" action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        <label for="name">名前</label>
        <input type="text" id="name" name="name" placeholder="例:山田太郎" value="{{ old('name') }}">
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" placeholder="例:coachtech1106">
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">登録</button>
    </form>
</body>

</html>