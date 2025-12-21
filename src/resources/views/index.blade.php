<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
    </header>

    <main class="container">
        <div class="contact-form__content">
            <div class="heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="/contacts/confirm" method="post">
                @csrf

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__name-content">
                            <div class="form__input-wrap">
                                <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}">
                            </div>
                            <div class="form__input-wrap">
                                <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="form__error">
                            @error('first_name') {{ $message }} @enderror
                            @error('last_name') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__gender-content">
                            <label><input type="radio" name="gender" value="1" {{ old('gender')==1?'checked':'' }}> 男性</label>
                            <label><input type="radio" name="gender" value="2" {{ old('gender')==2?'checked':'' }}> 女性</label>
                            <label><input type="radio" name="gender" value="3" {{ old('gender')==3?'checked':'' }}> その他</label>
                        </div>
                        <div class="form__error">
                            @error('gender') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__tel-content">
                            <div class="form__input-wrap">
                                <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                            </div>
                            <span>-</span>
                            <div class="form__input-wrap">
                                <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                            </div>
                            <span>-</span>
                            <div class="form__input-wrap">
                                <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                            </div>
                        </div>
                        <div class="form__error">
                            @error('tel1') {{ $message }} @enderror
                            @error('tel2') {{ $message }} @enderror
                            @error('tel3') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                        <div class="form__error">
                            @error('email') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <input type="text" name="address" value="{{ old('address') }}">
                        <div class="form__error">
                            @error('address') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <input type="text" name="building" value="{{ old('building') }}">
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問合せの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <select name="category_id">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>
                                {{ $category->content }}
                            </option>
                            @endforeach
                        </select>
                        <div class="form__error">
                            @error('category_id') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <textarea name="detail" placeholder="お問い合わせ内容をご確認ください">{{ old('detail') }}</textarea>
                        <div class="form__error">
                            @error('detail') {{ $message }} @enderror
                        </div>
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>

    </main>
</body>

</html>