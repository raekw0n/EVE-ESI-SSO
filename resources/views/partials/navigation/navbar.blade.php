<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" alt="" class="d-none d-md-flex">
        <img src="{{ asset('images/logo-sm.png') }}" alt="" class="d-none d-sm-flex d-md-none">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"> <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('haulage') }}"><i class="fas fa-rocket"></i> Haulage Quote</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('apply') }}"><i class="fas fa-plus"></i> Apply to Join</a>
            </li>
            @esiauth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="corporate_management" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Corporation Management
                </a>
                <div class="dropdown-menu" aria-labelledby="corporate_management">
                    <a class="dropdown-item nav-item" href="{{ route('corporate.management') }}"><i class="fas fa-star"></i> Dashboard</a>
                    <a class="dropdown-item nav0item" href="{{ route('corporate.contracts') }}"><i class="fas fa-compass"></i> Contracts</a>
                </div>
            </li>
            @endesiauth
        </ul>
        <ul class="navbar-nav ml-auto">
            @esiauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="esi_auth_menu" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('character')['name'] }}
                        <img alt="portrait" class="ml-2" src="{{ session('character')['portrait'] }}" width="36">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="esi_auth_menu">
                        <a class="dropdown-item nav-item" href="{{ route('esi.sso.logout') }}">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('esi.sso.login') }}">
                        <img class="img-fluid" src="{{ asset('images/eve-sso-login.png') }}" alt="">
                    </a>
                </li>
            @endesiauth
        </ul>
    </div>
</nav>
