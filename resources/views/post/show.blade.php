@extends('base')

@section('title' ,'show')
    
@section('header')
   @include('header')
@endsection

@section('content')

<section class="row">
   <div class="border col-12  my-3">
        <h1 class="display-6 text-primary fw-bold">{{ $post->title }}</h1>
        <p class="">{{ $post->content }}</p>
         @if (isset($post->image))
            <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Image du post">
         @endif
   </div>
</section>

@endsection

