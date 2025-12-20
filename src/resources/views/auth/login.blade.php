<form class="form" action="/login" method="post">
    @csrf
    <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
    @error('email')<div style="color:red">{{ $message }}</div>@enderror

    <input type="password" name="password" placeholder="パスワード">
    @error('password')<div style="color:red">{{ $message }}</div>@enderror

    @if(session('login_error'))
    <div style="color:red">{{ session('login_error') }}</div>
    @endif

    <button type="submit">ログイン</button>
</form>
<a href="{{ route('register') }}">新規登録</a>