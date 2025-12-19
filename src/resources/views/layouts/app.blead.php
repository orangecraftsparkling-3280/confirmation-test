<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- ヘッダー -->
    <header class="admin-header">
        <h1 class="logo">FashionablyLate</h1>
        <form action="/logout" method="POST">
            @csrf
            <button class="logout">logout</button>
        </form>
    </header>

    <main class="admin-main">

        <h2 class="admin-title">Admin</h2>

        <!-- 検索フォーム -->
        <form class="search-form" method="GET" action="/admin/contacts">
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
            <a href="/admin/contacts" class="btn-reset">リセット</a>
        </form>

        <!-- エクスポート・ページネーション -->
        <div class="sub-bar">
            <button class="btn-export">エクスポート</button>
            {{ $contacts->links() }}
        </div>

        <!-- 一覧テーブル -->
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
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '' }}</td>
                <td>
                    <a href="/admin/contacts/{{ $contact->id }}" class="btn-detail">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>

    </main>

</body>

</html>