@extends('layout')

@section('title', $thread->title)

@section('content')
    <div class="container">
        <h2>{{ $thread->title }}</h2>
        <p>{{ $thread->overview }}</p>

        <h3>投稿一覧</h3>
        @foreach ($thread->posts as $post)
         <div class="post">
                <p>{{ $post->content }}</p>
                @if ($post->image)
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $post->image->path) }}" alt="投稿画像" width="200">
                    </div>
                @endif
                <button class="like-button" data-post-id="{{ $post->id }}">
            @if ($post->isLikedByUser())
                いいね済み <span class="like-count">{{ $post->likes->count() }}</span>
            @else
                いいね <span class="like-count">{{ $post->likes->count() }}</span>
            @endif
        </button>
    </div>
    @endforeach
 
@endsection
       
   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.like-button').click(function () {
            var postId = $(this).data('post-id');
            var likeCount = $(this).find('.like-count');

            $.ajax({
                type: 'POST',
                url: '/like/' + postId,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (data) {
                    likeCount.text(data.likeCount);

                    // ボタンのテキストを切り替え
                    if (data.isLiked) {
                        $('.like-button[data-post-id="' + postId + '"]').text('いいね済み ' + data.likeCount);
                    } else {
                        $('.like-button[data-post-id="' + postId + '"]').text('いいね ' + data.likeCount);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

          


