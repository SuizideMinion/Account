
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <a href="/"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ request()->is('home') ? 'active': ''}}" href="/home">Home</a></li>
                <li><a class="nav-link {{ request()->is('accounts') ? 'active': ''}}" href="/accounts">Server</a></li>
                <li><a class="nav-link {{ request()->is('discord') ? 'active': ''}}" href="https://discord.gg/gqegaKQmB7" target="_Blank">Discord</a></li>
                <li><a class="nav-link {{ request()->is('transaction') ? 'active': ''}}" href="/transaction">Spenden</a></li>
                <li class="dropdown"><a href="#"><span>Community</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/forum">Forum</a></li>
                        <li><a href="/wiki">Wiki (Comming Soon)</a></li>
                        <li><a href="/wiki">Community Umfragen (Comming Soon)</a></li>
                    </ul>
                </li>
                @guest
                    <li class="dropdown"><a href="#"><span>Login/Register</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a class="nav-link {{ request()->is('ticket') ? 'active': ''}}" href="/ticket">Support
                        </a>
                    </li>
                    <li class="dropdown"><a href="#"><span>{{ auth()->user()->spielername }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
{{--                            <li><a href="{{ route('user.show', auth()->user()->id) }}">Dein Provil</a></li>--}}
{{--                            <li><a href="{{ route('usernotiz.index') }}">Notizblock</a></li>--}}
{{--                            <li><a href="{{ route('user.edit', auth()->user()->id) }}">Einstellungen</a></li>--}}
{{--                            <li><a class="nav-link" href="{{ route('signout') }}">Logout</a></li>--}}
                        </ul>
                    </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
