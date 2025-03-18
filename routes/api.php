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

    // Routes d'inscription et de connexion
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Routes pour les posts, protégées par le middleware auth:sanctum
    Route::resource('posts', PostController::class)->middleware('auth:sanctum');

    // Routes pour les commentaires, protégées également par auth:sanctum
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->middleware('auth:sanctum');
