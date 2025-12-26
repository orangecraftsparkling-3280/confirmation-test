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

            <table class="confirm-table__inner">
                <tr>
                    <th>お名前</th>
                    <td>
                        {{ $contact['first_name'] }} {{ $contact['last_name'] }}
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    </td>
                </tr>

                <tr>
                    <th>性別</th>
                    <td>
                        {{ $contact['gender_label'] }}
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    </td>
                </tr>

                <tr>
                    <th>メール</th>
                    <td>
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    </td>
                </tr>

                <tr>
                    <th>電話番号</th>
                    <td>
                        {{ $contact['tel'] }}
                        <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                    </td>
                </tr>

                <tr>
                    <th>住所</th>
                    <td>
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    </td>
                </tr>

                <tr>
                    <th>建物名</th>
                    <td>
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    </td>
                </tr>

                <tr>
                    <th>種類</th>
                    <td>
                        {{ $contact['category_label'] }}
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    </td>
                </tr>

                <tr>
                    <th>内容</th>
                    <td>
                        {{ $contact['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                    </td>
                </tr>
            </table>

            <button type="submit">送信</button>
        </form>

        <form action="{{ route('contact.edit') }}" method="post">
            @csrf
            @foreach ($inputs as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit">修正</button>
        </form>

    </main>
</body>

</html>