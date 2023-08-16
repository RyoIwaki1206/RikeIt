<div class="header">
    <div class="header-left">
        <a href="{{ route('home') }}">RikeIt</a>
    </div>
    <div class="header-right">
        @if (Auth::check())
            <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                ログアウト
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>
</div>


