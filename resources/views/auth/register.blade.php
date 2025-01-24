@extends('base')

@section('title' ,'register page')
    

@section('content')

    <div class="d-flex justify-content-center align-items-center vh-100 flex-column">

        <img class="text-center" src="{{ asset('blog.png') }}" alt="" width="40">

        <p class="figure-caption">Lorem, ipsum dolor.</p>

        <form class="p-4 shadow  widthForm bg-white" action="{{ route('register') }}" method="post">

            @csrf

            <x-input wrapClass="mb-2" name="name" label="Nom" class="form-control bg-light"  lClass="form-label" type="text" value="{{old('name')}}"/>

            <x-input wrapClass="mb-2" name="email" label="Email" class="form-control bg-light"  lClass="form-label" type="email" value="{{old('email')}}"/>

            <x-input wrapClass="mb-1" label="mot de passe" name="password" class="form-control bg-light"  lClass="form-label" type="password" value=""/>

            <x-input wrapClass="mb-4"  class="form-control btn btn-primary"   type="submit" value="Soumettre"/>

            <label class="me-2" for="">A déjà un compte ?</label>

            <a class="fw-bold text-decoration-none text-dark " href="">Se connecter</a>

        </form>

    </div>

@endsection
