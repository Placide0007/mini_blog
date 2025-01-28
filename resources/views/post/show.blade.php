@extends('base')

@section('title' ,'show')
    
@section('header')
   @include('header')
@endsection

@section('content')

<section class="row">
   <div class="border col-12 col-md-6 offset-md-3 p-3 my-3 overflow-y-scroll">

      <div class="d-flex justify-content-between align-items-center">
         <h1 class="display-6">{{ $post->title }}</h1>
         @if (auth()->check() && auth()->user()->id === $post->user_id)
             <a class="figure-caption text-decoration-none bg-light p-2 rounded" href="">supprimer</a>
         @endif
     </div>
     

         <h1 class="display-6 figure-caption">{{ date('Y-m-d', strtotime($post->created_at)) }}</h1
            
         <p class="">{{ $post->content }}</p>

         @if (isset($post->image))
            <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Image du post">
         @endif

         <div class="mt-3 ">
            <form class="" action="{{ route('comments.store',$post) }}" method="post">

               @csrf 

               <div class="input-group">
                   <input class="form-control" placeholder="Commenter" name="content" type="text">
                   <button type="submit" class="btn btn-primary">Commenter</button>
               </div>
               
           </form>  

         </div>

         @foreach ($post->comments as $comment)

             <div class="border mt-3 p-3">

               <div class="d-flex justify-content-between align-items-center mb-2">
                  <button class="btn btn-dark" >{{ ucwords($comment->user->name) }}</button>
                  @if (auth()->check() && auth()->user()->id === $comment->user_id)
                     <div>
                        <a class="figure-caption me-2 text-decoration-none bg-light p-2 rounded"  href="">modifier</a>
                        <a class="figure-caption text-decoration-none bg-light p-2 rounded"  href="">supprimer</a>
                     </div>
                  @endif
               </div>
               
               <h1 class="display-6 figure-caption">{{ $comment->created_at->format('d M Y, H:i') }}</h1>

               {{ $comment->content }}

             </div>

         @endforeach 

   </div>

</section>

@endsection

