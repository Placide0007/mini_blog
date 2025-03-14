<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $login_request){

        $credentials = $login_request->validated();
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $user,
            ],201);
        }
            return response()->json([
                'success' => false,
                'message' => 'les information saisi sont incorrect'
            ],401);
    }
}
