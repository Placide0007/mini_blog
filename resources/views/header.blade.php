<header class="navbar navbar-expand-md bg-light navbar-light sticky-top px-5 py-2 py-md-0  border border-bottom shadow">

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
                <a href="{{ route('posts.index') }}" class="px-3 px-md-2 nav-link {{ request()->routeIs('posts.index') ? 'active-link' : 'hover' }}">Accueil</a>
            </li>
            <li class="nav-item ms-md-5">
                <a href="" class="nav-link hover">A propos</a>
            </li>
            <li class="nav-item ms-md-5 bg-secondary">
                <a href="{{ route('posts.create') }}" class="nav-link text-light px-3 px-md-2">Publier un article</a>
            </li>

            {{-- header authentifier --}}
            @auth
            <div class="dropdown ms-md-5">
                <a class="nav-item nav-link   border fw-bold px-3 py-2 bg-primary text-light rounded" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Str::upper(substr(auth()->user()->name, 0, 2)) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="dropdownMenuLink" style="width: 10px;">
                    <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                </ul>
            </div>
            @endauth

            {{-- header non-authentifier --}}
            @guest
            <a href="" class="btn btn-primary ms-md-2 px-4 btn-sm d-none d-md-inline">Connexion</a>
            <a href="" class="btn btn-outline-secondary ms-md-2 px-4 d-none d-md-inline btn-sm">Inscription</a>
            @endguest

        </ul>

    </nav>

</header>
