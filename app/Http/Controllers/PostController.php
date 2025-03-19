<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::with('user', 'comments.user')->latest()->get();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $img_path = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img_path = $image->store('image', 'public');
        }

        $user_id = Auth::id();
        $post = Post::create([
            'content' => $request->content,
            'user_id' => $user_id,
            'image' => $img_path,
        ]);
        return response()->json([
            'post' => $post
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with(['user', 'comments.user'])->findOrFail($id);
        return response()->json([
            'post' => $post
        ]);
    }

}
