<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('header')

    <div class="content">
        @yield('content')
    </div>

    @include('footer')
</body>
</html>

