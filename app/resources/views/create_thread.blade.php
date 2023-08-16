@extends('layout')

@section('title', 'ページのタイトル')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>新規スレッド申請</title>
</head>
<body>
    <h1>新規スレッド申請</h1>

    <form method="POST" action="{{ route('threads.store') }}">
    @csrf
    <label for="title">スレッドタイトル</label>
    <input type="text" name="title" id="title" required>
    
    <label for="body">概要</label>
    <textarea name="overview" id="overview" rows="4" required></textarea>

    <button type="submit">スレッドを作成</button>
</form>


    <a href="{{ route('home') }}">戻る</a>

</body>
</html>
@endsection
