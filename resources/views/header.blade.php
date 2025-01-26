<header class="navbar navbar-expand-md bg-light navbar-light sticky-top px-5 py-0 border border-bottom">

    <a class="navbar-brand" href="">
        <img src="{{ asset('blog.png') }}" alt="logo" width="25">
        <span class="fs-6">Lorem ipsum dolor!</span>
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#content">
        <i class="navbar-toggler-icon"></i>
    </button>

    <nav class="collapse navbar-collapse" id="content">

        <ul class="navbar-nav ms-auto me-auto">

            <a href="" class="nav-item nav-link hover">Accueil</a>
            <a href="" class="nav-item nav-link ms-md-5 hover">A propos</a>
            <a href="" class="nav-item nav-link ms-md-5 hover">Contact</a>

            <div class="dropdown ms-md-5">
                <a class="nav-item nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

        </ul>

        <form action="" method="post">

            @auth

            <div class="dropdown ms-md-5 ms-auto">
                <a class="px-5 text-primary nav-item nav-link dropdown-toggle fw-bold" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Str::upper(substr(auth()->user()->name,0,2)) }}
                </a>
                <ul class="dropdown-menu  border">
                    <li class="" ><a class="dropdown-item" href="#">Mon Profil</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                </ul>
            </div>

            @endauth

            @guest
                <a href="" class="btn btn-primary ms-md-2 px-4 btn-sm d-none d-md-inline">Connexion</a>
                <a href="" class="btn btn-outline-secondary ms-md-2 px-4 d-none d-md-inline btn-sm">Inscription</a>
            @endguest

        </form>

    </nav>

</header>
