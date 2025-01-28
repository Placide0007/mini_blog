@extends('base')

@section('title', 'home page')

@section('header')
    @include('header')
@endsection

@section('content')

<section class="row">

    <!-- Colonne gauche (visible sur les écrans moyens et grands) -->
    <div class="d-none d-md-block col-md-3 border p-1 left rounded bg-white">
        @foreach ($posts as $post)
            <div class="border-bottom my-4 p-2">
                <h1 class="lead fw-bold">{{ ucwords($post->user->name) }}</h1>
                <p>{{ $post->title }}</p>
                
                <!-- Actions post -->
                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-end disabled text-decoration-none text-dark">
                        <i class="bi bi-chat-right me-1"></i>
                        {{ $post->comments->count() }}
                    </a>
                    <a class="text-decoration-none text-primary" href="{{ route('posts.show', $post) }}">
                        <i class="bi bi-chat-left-text me-1"></i>
                        Voir le poste
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Colonne centrale (affichage principal des posts) -->
    <div class="center offset-md-3 p-3 col-md-6 bg-light">
        @foreach ($posts as $post)
            <div class="border mb-3 p-3 bg-white">
                <h1 class="display-6">{{ $post->title }}</h1>
                <h1 class="display-6 figure-caption">{{ date('Y-m-d', strtotime($post->created_at)) }}</h1>
                <p class="lead fw-bold text-primary">{{ ucwords($post->user->name) }}</p>

                <!-- Image du post (si disponible) -->
                @if (isset($post->image))
                    <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Image du post">
                @endif
                
                <!-- Actions post (visible sur mobile uniquement) -->
                <div class="d-flex justify-content-between align-items-center mt-2 d-md-none d-block">
                    <a class="text-end disabled text-decoration-none text-dark">
                        <i class="bi bi-chat-right me-1"></i>
                        {{ $post->comments->count() }}
                    </a>
                    <a class="text-decoration-none text-primary" href="{{ route('posts.show', $post) }}">
                        <i class="bi bi-chat-left-text me-1"></i>
                        Voir le poste
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Colonne droite (visible sur les écrans moyens et grands) -->
    <div class="d-none d-md-block col-md-3 border p-1 right bg-white">
        @foreach ($posts as $post)
            <div class="border-bottom my-4 p-2">
                <h1 class="lead fw-bold">{{ ucwords($post->user->name) }}</h1>
                <p>{{ $post->title }}</p>

                <!-- Actions post -->
                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-end disabled text-decoration-none text-dark">
                        <i class="bi bi-chat-right me-1"></i>
                        {{ $post->comments->count() }}
                    </a>
                    <a class="text-decoration-none text-primary" href="{{ route('posts.show', $post) }}">
                        <i class="bi bi-chat-left-text me-1"></i>
                        Voir le poste
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</section>

@endsection
