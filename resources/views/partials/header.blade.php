<nav class="navbar navbar-expand navbar-light bg-light">
    <a href="{{route('shop.index')}}" class="navbar-brand">TheShop</a>
    <ul class="navbar-nav">
        @if(!Auth::check())
            <li><a href="{{ url('/login') }}"class="nav-link">Login</a></li>
            <li><a href="{{ url('/register') }}"class="nav-link">Register</a></li>
        @else
            <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link">Admin</a></li>
            <li>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav-link">
                        Logout
                </a>
                <form id="logout-form" action="{{url('/logout')}}" method="POST">
                    {{csrf_field()}}
                </form>
            </li>
        @endif
    </ul>
</nav>