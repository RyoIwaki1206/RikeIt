@extends('layout')

@section('title', 'スレッド一覧')

@section('content')
    <h1>スレッド一覧</h1>

    <ul>
    @if(isset($threads))
            @foreach ($threads as $thread)
                <li><a href="{{ route('threads.show', ['thread' => $thread->id]) }}">{{ $thread->title }}</a></li>
            @endforeach
        @endif
    </ul>
@endsection



