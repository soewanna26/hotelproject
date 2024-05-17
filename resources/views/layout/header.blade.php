<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                    <div class="center-desk">
                        <div class="logo">
                            <a href="{{ Auth::check() ? route('account.dashboard') : route('home') }}"><img src="{{ asset("images/text.png") }}" alt="#" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ Request::routeIs('account.dashboard') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ Auth::check() ? route('account.dashboard') : route('home') }}">Home</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('ourRooms') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('ourRooms') }}">Our room</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('ourGallaries') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('ourGallaries') }}">Gallery</a>
                            </li>
                            <li class="nav-item {{ Request::routeIs('ourContacts') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('ourContacts') }}">Contact Us</a>
                            </li>
                            @if (Auth::check())
                                <li>
                                    <a class="btn btn-dark" href="{{ route('account.logout') }}">Logout</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-success" href="{{ route('account.login') }}">Login</a>
                                </li>
                                <li class="nav-item ml-3">
                                    <a class="btn btn-primary " href="{{ route('account.register') }}">Register</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
