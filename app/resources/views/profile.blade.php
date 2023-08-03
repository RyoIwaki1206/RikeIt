@include('header')

<!DOCTYPE html>
<html>
<head>
    <title>プロフィール</title>
</head>
<body>
    <h1>プロフィール</h1>
    <div>
        <img src="{{ Auth::user()->profile_image }}" alt="プロフィール画像" width="100" height="100">
        <p>ユーザーネーム: {{ Auth::user()->name }}</p>
        <a href="{{ route('profile.edit') }}">プロフィール編集</a>
    </div>

    <h2>投稿一覧</h2>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->content }}</li>
        @endforeach
    </ul>

    <h2>いいね一覧</h2>
    <ul>
        @foreach($likes as $like)
            <li>{{ $like->post->content }}</li>
        @endforeach
    </ul>
</body>
</html>

@include('footer')
