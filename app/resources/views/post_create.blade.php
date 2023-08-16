@extends('layout')

@section('title', '新規投稿')

@section('content')
<div class="container">
    <h2>新規投稿</h2>
    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="thread">スレッド選択</label>
            <select class="form-control" id="thread" name="thread_id">
                @foreach($threads as $thread)
                    <option value="{{ $thread->id }}">{{ $thread->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">コメント</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image">画像選択</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">投稿</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">戻る</a>
    </form>
</div>
@endsection
