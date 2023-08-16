<!-- resources/views/admin/index.blade.php -->

@extends('layout')

@section('title', '管理者トップページ')

@section('content')
    <div class="container">
        <h2>管理者トップページ</h2>

        <!-- ユーザー名検索ボックス -->
        <form action="{{ route('admin.search') }}" method="GET">
            <input type="text" name="keyword" placeholder="ユーザー名を入力">
            <button type="submit">検索</button>
        </form>

        <!-- 一般ユーザー一覧 -->
        <h3>一般ユーザー一覧</h3>
        @foreach ($users as $user)
    <p>
        <a href="{{ route('admin.userProfile', ['id' => $user->id]) }}">{{ $user->name }}</a>
        <form action="{{ route('admin.deleteUser', ['id' => $user->id]) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
    </p>
@endforeach
    </div>
@endsection
