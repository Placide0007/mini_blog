
@extends('base')

@section('title' ,'home page')
    
@section('header')
   @include('header')
@endsection

@section('content')

<section class="row">

   <div class="d-none d-md-block  border p-1 vh-100 left">
         @foreach ($posts as $post)
            <div class="border my-4 p-3 bg-light">
               <h1 class="lead fw-bold">{{ ucwords($post->user->name ) }}</h1>
               <p>{{ $post->title }}</p>
               <a href="{{ route('posts.show',$post) }}">Voir le poste</a>
               <p></p>
            </div>
         @endforeach
   </div>

   <div class="center  col-md-6 offset-md-3 py-3 m-3center">
     
         @foreach ($posts as $post)
             <div class="border mb-3 p-2">
               <h1 class="display-6">{{ $post->title }}</h1>
               <h1 class="display-6 figure-caption">{{ date('Y-m-d', strtotime($post->created_at)) }}</h1>
               <p class="lead">{{ ucwords($post->user->name ) }}</p>
               @if (isset($post->image))
                  <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Image du post">
               @endif
             </div>
         @endforeach

      </div>
   
   <div class="d-none d-md-block  border vh-100 right">
      <p>Lorem ipsum dolor sit amet.</p>
   </div>
   
</section>

@endsection

