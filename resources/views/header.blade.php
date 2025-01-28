<header class="navbar navbar-expand-md bg-light navbar-light sticky-top px-5 py-0 border border-bottom shadow">

    <!-- Logo -->
    <a class="navbar-brand" href="">
        <img src="{{ asset('blog.png') }}" alt="logo" width="25">
        <span class="fs-6">Lorem ipsum dolor!</span>
    </a>

    <!-- Bouton de menu (mobile) -->
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#content">
        <i class="navbar-toggler-icon"></i>
    </button>

    <!-- Menu de navigation -->
    <nav class="collapse navbar-collapse" id="content">
        <ul class="navbar-nav ms-auto">

            <!-- Liens principaux -->
            <li class="nav-item">
                <a href="" class="nav-link hover">Accueil</a>
            </li>
            <li class="nav-item ms-md-5">
                <a href="" class="nav-link hover">A propos</a>
            </li>
            <li class="nav-item ms-md-5">
                <a href="" class="nav-link hover">Contact</a>
            </li>
            <li class="nav-item ms-md-5">
                <a href="" class="nav-link hover">Publier un article</a>
            </li>

            <!-- section Authentification-->
            @auth

            <div class="dropdown ms-md-5">
                <a class="nav-item nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Str::upper(substr(auth()->user()->name, 0, 2)) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                </ul>
            </div>
                
            @endauth

            {{-- section non authentifié --}}

            @guest
            <a href="" class="btn btn-primary ms-md-2 px-4 btn-sm d-none d-md-inline">Connexion</a>
            <a href="" class="btn btn-outline-secondary ms-md-2 px-4 d-none d-md-inline btn-sm">Inscription</a>
             @endguest

        </ul>

    </nav>

</header>
