
@extends('base')

@section('title' ,'login page')
    <div class="border col-12 col-md-6 offset-md-3 p-3 my-3 bg-ligh">

        <form class="p-4 w-100 " enctype="multipart/form-data" action="{{ route('posts.store') }}" method="post" style="width: 400px" >

            @csrf

            <x-input wrapClass="mb-4" name="title" label="Titre du poste" class="form-control" placeholder="Entrer le titre" lClass="form-label" type="text" value="{{old('title')}}"/>

            <x-text-area rows="15" cols="10" class="form-control" placeholder="Contenu..." name="content" />

            <x-input wrapClass="mb-4" name="image"  class="form-control"  lClass="form-label" type="file" />

            <x-input wrapClass="mb-4"  class="form-control btn btn-primary"   type="submit" value="Publier"/>

        </form>

    </div>
    

@section('content')



@endsection

