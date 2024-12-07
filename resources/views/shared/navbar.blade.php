<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Jalapeño</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Lewa część nawigacji -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('peppers.index')) active @endif" href="{{ route('peppers.index') }}">Strona Główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('peppers.all_peppers')) active @endif" href="{{ route('peppers.all_peppers') }}">Oferta</a>
                </li>
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('orders.index')) active @endif" href="{{ route('orders.index') }}">Zamówienia</a>
                    </li>
                @endif
            </ul>
            <!-- Prawa część nawigacji -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item pr-5">
                    <button class="nav-link" onclick="themeToggle()">
                        <i class="bi bi-toggle-on active"></i>
                    </button>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('login')) active @endif" href="{{ route('login') }}">Zaloguj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white ms-2 @if (request()->routeIs('register')) active @endif"
                            href="{{ route('register') }}">Zarejestruj się</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
