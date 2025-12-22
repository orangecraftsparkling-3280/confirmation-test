@extends('layouts.app')

@section('title', 'Register')

@section('content')
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
@endsection