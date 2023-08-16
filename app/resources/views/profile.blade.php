@extends('layout')

@section('title', 'ページのタイトル')

@section('content')

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
@foreach ($posts as $post)
    <div class="post">
        <p>{{ $post->content }}</p>
        @if ($post->image)
            <div class="image-container">
                <img src="{{ asset('storage/' . $post->image->path) }}" alt="投稿画像" width="200">
            </div>
        @endif
    </div>
@endforeach

    <div class="container">
        <h2>いいね一覧</h2>
        @foreach ($user->likedPostsWithImages as $post)
            <div class="post">
                <p>{{ $post->content }}</p>
                @if ($post->image)
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $post->image->path) }}" alt="投稿画像" width="200">
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
@endsection
        

