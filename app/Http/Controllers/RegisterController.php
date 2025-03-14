<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(RegisterRequest $register_request){
        $user = User::create([
            'pseudo' => Str::ucfirst($register_request->pseudo),
            'email' => $register_request->email,
            'password' => Hash::make($register_request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ],201);
    }
}
