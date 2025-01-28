@extends('base')

@section('title', 'show')

@section('header')
   @include('header')
@endsection

@section('content')

<section class="row">
   <div class="border col-12 col-md-6 offset-md-3 p-3 my-3 overflow-y-scroll">

      <!-- Affichage du titre et des options pour l'utilisateur connecté -->
      <div class="d-flex justify-content-between align-items-center">
         <h1 class="display-6">{{ $post->title }}</h1>
         @if (auth()->check() && auth()->user()->id === $post->user_id)
             <a class="figure-caption text-decoration-none bg-light p-2 rounded" href="">supprimer</a>
         @endif
      </div>

      <!-- Affichage de la date de création du post -->
      <h1 class="display-6 figure-caption">{{ $post->created_at->format('d M Y, H:i') }}</h1>
            
      <p>{{ $post->content }}</p>

      <!-- Affichage de l'image du post, si elle existe -->
      @if (isset($post->image))
         <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Image du post">
      @endif

      <!-- Formulaire de commentaire -->
      <div class="mt-3">
         <form action="{{ route('comments.store', $post) }}" method="post">
            @csrf 
            <div class="input-group">
               <input class="form-control" placeholder="Commenter" name="content" type="text">
               <button type="submit" class="btn btn-primary btn-sm">Commenter</button>
            </div>
         </form>  
      </div>

      <!-- Affichage des commentaires -->
      @foreach ($post->comments as $comment)
         <div class="border mt-3 p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
               <button class="btn btn-dark">{{ ucwords($comment->user->name) }}</button>
               @if (auth()->check() && auth()->user()->id === $comment->user_id)
                  <div>
                     <a class="figure-caption me-2 text-decoration-none bg-light p-2 rounded" href="">modifier</a>
                     <a class="figure-caption text-decoration-none bg-light p-2 rounded" href="">supprimer</a>
                  </div>
               @endif
            </div>

            <!-- Affichage de la date du commentaire -->
            <h1 class="display-6 figure-caption">{{ $comment->created_at->format('d M Y, H:i') }}</h1>

            <!-- Contenu du commentaire -->
            <p>{{ $comment->content }}</p>
         </div>
      @endforeach 

   </div>
</section>

@endsection
