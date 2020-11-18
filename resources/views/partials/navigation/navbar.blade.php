<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"> <i class="fas fa-home"></i> Home</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-wrench"></i> Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('haulage') }}">Haulage</a>
                    <a class="dropdown-item" href="{{ route('manufacturing') }}">Manufacturing</a>
                    <a class="dropdown-item" href="{{ route('reprocessing') }}">Reprocessing</a>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('haulage') }}"><i class="fas fa-truck"></i> Haulage Quote</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('apply') }}"><i class="fas fa-plus"></i> Apply to Join</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
{{--            @esiguest--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('esi.sso.login') }}">
                        <img class="img-fluid" src="{{ asset('images/eve-sso-login.png') }}" alt="">
                    </a>
                </li>
{{--            @endesiguest--}}
        </ul>
    </div>
</nav>
