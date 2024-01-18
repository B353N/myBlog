<nav class="myblog-nav" role="navigation">

    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div id="myblog-logo"><a href="/">My Blog</a></div>
                </div>
                <div class="col-md-10 text-right menu-1">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @guest
                            <li class="btn-cta"><a href="{{ route('login') }}"><span>Sign in</span></a></li>
                        @endguest

                        @auth
                            <li class="has-dropdown">
                                <a href="#">{{ auth()->user()->name }} <span class="caret"></span> </a>
                                <ul class="dropdown">
                                    <li><a onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit()" href="{{ route('logout') }}">Logout</a></li>

                                    <form id="nav-logout-form" action="{{ route('logout') }}" method="post">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<aside id="myblog-hero">
    <div class="flexslider">
        <ul class="slides">

        </ul>
    </div>
</aside>
