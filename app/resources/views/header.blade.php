<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIkeIt</title>
</head>
<body>
    <header>
        <a href="{{ route('home') }}">RIkeIt</a>
        <div>
            <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </header>

