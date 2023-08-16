@extends('layout')

@section('title', 'ページのタイトル')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>プロフィール編集</title>
</head>
<body>
    <h1>プロフィール編集</h1>
    <form method="POST" action="{{ route('profile.save') }}">
        @csrf
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
        </div>

        <div>
            <label for="user_id">ユーザーID</label>
            <input type="text" name="user_id" id="user_id" value="{{ $user->user_id }}">
        </div>

        <div>
            <button type="submit">保存</button>
        </div>
    </form>
    <a href="{{ route('profile') }}">戻る</a>
</body>
</html>

@endsection
