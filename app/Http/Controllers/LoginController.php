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
            return redirect()->route('posts.index');
       }

       return back()->withErrors([
            'email' => 'verifier les information saisie',
       ])->withInput();

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}

