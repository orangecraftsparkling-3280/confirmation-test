<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <header class="admin-header">
        <h1 class="logo">FashionablyLate</h1>
        <form class="form" action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">logout</button>
        </form>
    </header>

    <main class="admin-main">

        <h2 class="admin-title">Admin</h2>

        <form class="search-form" method="GET" action="/admin">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">

            <select name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>

            <select name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->content }}
                </option>
                @endforeach
            </select>

            <input type="date" name="date">

            <button class="btn-search">検索</button>
            <a href="/admin" class="btn-reset">リセット</a>
        </form>

        <div class="sub-bar">
            <a href="{{ route('admin.export', request()->query()) }}" class="btn-export">エクスポート</a>
            {{ $contacts->links() }}
        </div>

        <table class="admin-table">
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>

            @foreach ($contacts as $contact)
            <tr>
                <td> {{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td>
                    {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '' }}</td>
                <td>
                    <a href="#modal-{{ $contact->id }}" class="detail-btn">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>

    </main>

    @foreach ($contacts as $contact)
    <div id="modal-{{ $contact->id }}" class="modal">
        <div class="modal-content">
            <a href="#" class="modal-close">×</a>

            <h3>お問い合わせ詳細</h3>

            <table class="modal-table">
                <tr>
                    <th>お名前</th>
                    <td> {{ $contact->first_name }} {{ $contact->last_name }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact->tel }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact->building }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact->category->content ?? '' }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact->detail }}</td>
                </tr>
            </table>
            <form action="/admin/contacts/{{ $contact->id }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn-delete"
                    onclick="return confirm('本当に削除しますか？')">
                    削除
                </button>
            </form>
        </div>
    </div>
    @endforeach

</body>

</html>