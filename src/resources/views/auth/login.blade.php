@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h2>Login</h2>
<form class="form" action="{{ route('login') }}" method="POST" novalidate>
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
@endsection