<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
    </header>
        <div class="heading">
            <h2>confirm</h2>
        </div>

    <main class="container">
            <form class="form" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                {{ $contact['first_name'] }} {{ $contact['last_name'] }}
                                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                {{ $contact['gender_label'] }}
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                {{ $contact['email'] }}
                                <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                {{ $contact['tel'] }}
                                <input type="hidden" name="tel" value="{{ $contact['tel'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                {{ $contact['address'] }}
                                <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                {{ $contact['building'] }}
                                <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                {{ $contact['category_label'] }}
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                {{ $contact['detail'] }}
                                <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                    <a href="{{ route('contact.index') }}" class="form__button-modify">修正</a>
                </div>
            </form>
    </main>
</body>

</html>