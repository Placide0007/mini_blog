@extends('base')

@section('title' ,'login page')
    

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100 flex-column">

        <img class="text-center" src="{{ asset('blog.png') }}" alt="" width="40">

        <p class="figure-caption">Lorem, ipsum dolor.</p>

        <form class="p-4 shadow  widthForm bg-white" action="{{ route('login') }}" method="post">

            @csrf

            <x-input wrapClass="mb-2" name="email" label="Email" class="form-control bg-light"  lClass="form-label" type="email" value="{{old('email')}}"/>

            <x-input wrapClass="mb-1" label="mot de passe" name="password" class="form-control bg-light"  lClass="form-label" type="password" value=""/>

            <x-input wrapClass="mb-4"  class="form-control btn btn-primary"   type="submit" value="Se connecter"/>

            <label class="me-2" for="">Vous avez pas de compte?</label>

            <a class="fw-bold text-decoration-none text-dark " href="">Creer un compte</a>

        </form>

    </div>

@endsection
