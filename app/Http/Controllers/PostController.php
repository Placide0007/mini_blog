<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $img_path = null ;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img_path = $image->store('image','public');
        }
        $user_id = Auth::id();
        $post = Post::create([
            'content' =>$request->content,
            'user_id' => $user_id,
            'image' => $img_path,
        ]);
        return response()->json([
            'post' => $post
        ],201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id) // Recevoir l'ID directement
    {
        $post = Post::with('user')->findOrFail($id); // Trouver le post avec l'ID
        return response()->json([
            'post' => $post
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
