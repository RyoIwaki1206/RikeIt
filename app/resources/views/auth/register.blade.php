<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    
    <style>
        
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
        <!-- 新規登録フォーム -->
        <form method="POST" action="{{ route('confirm') }}">
            @csrf
            <h2>新規登録</h2>

            <div>
                <label for="name">ユーザー名</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">パスワードを確認</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>
</html>
