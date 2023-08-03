<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
@include('header')
    <h1>ようこそ、{{ Auth::user()->name }}さん！</h1>
    <p>ログインに成功しました。</p>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        ログアウト
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('footer')
</body>
</html>

