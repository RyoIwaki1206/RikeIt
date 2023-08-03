<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
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
        <!-- ロゴ画像を表示 -->
        <div class="logo">
            <img src="/path/to/your/logo.png" alt="Rike It Logo" width="100" height="100">
        </div>

        <!-- ログインフォーム -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <button type="submit">ログイン</button>
            </div>
        </form>

        <!-- 新規登録リンク -->
        <div>
            <a href="{{ route('register') }}">新規登録はこちら</a>
        </div>

        <!-- パスワードリセットリンク -->
        <div>
            <a href="{{ route('password.request') }}">パスワードをお忘れの方はこちら</a>
        </div>
    </div>
</body>
</html>
