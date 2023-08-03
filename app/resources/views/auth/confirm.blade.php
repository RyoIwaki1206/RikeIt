<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力内容確認</title>
    <!-- ここにCSSファイルのリンクを追加する場合は記述 -->
    <style>
        /* 画面中央にロゴを表示するスタイル */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logo {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- 入力内容の表示 -->
        <h2>入力内容確認</h2>
        <div>
            <p>ユーザー名: {{ $data['name'] }}</p>
            <p>メールアドレス: {{ $data['email'] }}</p>
            <p>パスワード: {{ $data['password'] }}</p>
            <p>パスワード確認: {{ $data['password'] }}</p>
        </div>

        <!-- 登録と戻るボタン -->
        <div>
            <form method="POST" action="{{ route('register_complete') }}">
                @csrf
                <input type="hidden" name="name" value="{{ $data['name'] }}">
                <input type="hidden" name="email" value="{{ $data['email'] }}">
                <input type="hidden" name="password" value="{{ $data['password'] }}">
                <input type="hidden" name="password" value="{{ $data['password'] }}">
                <button type="submit">登録</button>
            </form>
            <button onclick="history.back()">戻る</button>
        </div>
    </div>
</body>
</html>
