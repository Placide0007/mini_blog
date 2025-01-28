
@extends('base')

@section('title' ,'home page')
    
@section('header')
   @include('header')
@endsection

@section('content')

<section class="row">

   <div class="d-none d-md-block col-md-3  border p-1  left rounded">

         @foreach ($posts as $post)

         <div class="border-bottom my-4 p-2">

            <h1 class="lead fw-bold">{{ ucwords($post->user->name ) }}</h1>

            <p>{{ $post->title }}</p>
            
            <div class="d-flex justify-content-between align-items-center" >

               <a class="text-end disabled text-decoration-none text-dark">
                  <i class="bi bi-chat-right me-1"></i>
                  {{ $post->comments->count() }}
               </a>

               <a class="text-decoration-none text-primary" href="{{ route('posts.show',$post) }}">
                  <i class="bi bi-chat-left-text me-1"></i>
                  Voir le poste
               </a>
            </div>

         </div>

         @endforeach
   </div>

   <div class="center offset-md-3 p-3 col-md-6 bg-light">
     
         @foreach ($posts as $post)

             <div class="border mb-3 p-3 bg-white">

                  <h1 class="display-6">{{ $post->title }}</h1>

                  <h1 class="display-6 figure-caption">{{ $comment->created_at->format('d M Y, H:i') }}</h1>

                  <p class="lead fw-bold text-primary">{{ ucwords($post->user->name ) }}</p>

                  @if (isset($post->image))
                     <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Image du post">
                  @endif
                  
                  <div class="d-flex justify-content-between align-items-center  mt-2 d-md-none d-block" >

                     <a class="text-end disabled text-decoration-none text-dark">
                        <i class="bi bi-chat-right me-1"></i>
                        {{ $post->comments->count() }}
                     </a>
      
                     <a class="text-decoration-none text-primary" href="{{ route('posts.show',$post) }}">
                        <i class="bi bi-chat-left-text me-1"></i>
                        Voir le poste
                     </a>

                  </div>

             </div>

         @endforeach

      </div>

      <div class="d-none d-md-block col-md-3  border p-1  right">

         @foreach ($posts as $post)

         <div class="border-bottom my-4 p-2">

            <h1 class="lead fw-bold">{{ ucwords($post->user->name ) }}</h1>

            <p>{{ $post->title }}</p>
            
            <div class="d-flex justify-content-between align-items-center" >

               <a class="text-end disabled text-decoration-none text-dark">
                  <i class="bi bi-chat-right me-1"></i>
                  {{ $post->comments->count() }}
               </a>

               <a class="text-decoration-none text-primary" href="{{ route('posts.show',$post) }}">
                  <i class="bi bi-chat-left-text me-1"></i>
                  Voir le poste
               </a>
            </div>

         </div>

         @endforeach
   </div>

</section>

@endsection

