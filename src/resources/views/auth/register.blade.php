{{-- resources/views/auth/register.blade.php --}}

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <h2>Register</h2>
    {{-- ログインリンク --}}
    <a href="{{ route('login') }}">ログイン</a>

    <form class="form" action="{{ route('register') }}" method="POST">
        @csrf

        {{-- 名前 --}}
        <input type="text" name="name" placeholder="お名前" value="{{ old('name') }}">
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror

        {{-- メールアドレス --}}
        <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        {{-- パスワード --}}
        <input type="password" name="password" placeholder="パスワード">
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        {{-- パスワード確認 --}}
        <input type="password" name="password_confirmation" placeholder="パスワード確認">

        {{-- 登録ボタン --}}
        <button type="submit">登録</button>

    </form>

</body>

</html>