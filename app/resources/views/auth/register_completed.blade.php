<!-- resources/views/auth/register_completed.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録完了</title>
</head>
<body>
    <div class="container">
        <!-- ユーザー情報の表示 -->
        <h2>新規登録完了</h2>
        <p>ユーザー名: {{ $data['name'] }}</p>
        <p>メールアドレス: {{ $data['email'] }}</p>
        <p>パスワード: ************</p>
        
        <!-- ログイン画面へ戻るボタン -->
        <a href="{{ route('login') }}">ログイン画面へ戻る</a>
    </div>
</body>
</html>
