<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[RegisterController::class, 'register'])->name('register');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::Resource('posts',PostController::class)->middleware('auth:sanctum');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth:sanctum');

