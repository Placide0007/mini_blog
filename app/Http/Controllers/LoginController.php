<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
       $credentials = $loginRequest->validated();

       if(Auth::attempt($credentials))
       {
            $loginRequest->session()->regenerate();
            return view('welcome');
       }

       return back()->withErrors([
            'email' => 'verifier les information saisie',
       ])->withInput();

    }
}

