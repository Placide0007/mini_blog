
@extends('base')

@section('title' ,'login page')
    

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100 flex-column">

        <form class="p-4 " enctype="multipart/form-data" action="{{ route('posts.store') }}" method="post" style="width: 400px" >

            @csrf

            <x-input wrapClass="mb-4" name="title" label="Titre" class="form-control" placeholder="Entrer le titre" lClass="form-label" type="text" value="{{old('title')}}"/>

            <x-text-area rows="5" cols="10" class="form-control" placeholder="Contenu..." name="content" />

            <x-input wrapClass="mb-4" name="image"  class="form-control"  lClass="form-label" type="file" />

            <x-input wrapClass="mb-4"  class="form-control btn btn-primary"   type="submit" value="Publier"/>

        </form>

    </div>

@endsection

