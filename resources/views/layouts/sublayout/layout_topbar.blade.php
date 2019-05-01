
<div class="top-bar trans200 static d-none d-md-block d-lg-block">
    <div class="top-bar-cont">
        <a href="/">
        <span class="logo-cont">
                <img class="logo" src="{{ asset('img/logo/BoardSpeak Logo.png') }}"/>
            </span>
        <span class="logo-sub">ALL COMMUNICATIONS in one place!</span>
        </a>
        <ul class="float-right">
            <li>
                <a href="/board/create" class="btn btn-createboard">
                Start a Board
                </a>
            </li>
            @if (Auth::check())

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="rounded-circle" style="width: 40px; height: 40px;" src="/storage/avatars/{{ Auth::user()->avatar }}" />
                    </a>

                    <div style="background-color: #1d68a7" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/member/home" ><span > {{ __('HomePage') }}</span></a>
                        <a class="dropdown-item" href="/user/profile"><span > {{ __('Profile') }}</span></a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span > {{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @else
                <li>
                    <a href="{{ route('newUser') }}">
                        Sign Up
                    </a>
                </li>
                <li>
                    <a href="" data-toggle="modal" data-target="#loginform">
                        Log In
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light d-block d-md-none .d-lg-none">
    <a class="navbar-brand" href="">
    <img src="img/logo/BoardSpeak Logo.png" width="180" height="40" alt="">
    <span class="logo-sub">ALL COMMUNICATIONS in one place!</span>
    </a>
    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-white">
            <li class="nav-item active">
                <a class="nav-link text-white" href="">Start a Board</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('login') }}">Log In</a>
            </li>
        </ul>
    </div>
</nav>