<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワードリセット</title>
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
        <!-- パスワードリセットのフォーム -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <h2>パスワードリセット</h2>

            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <button type="submit">リセットリンクを送信</button>
            </div>
        </form>
    </div>
</body>
</html>
