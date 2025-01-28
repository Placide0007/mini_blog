<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids as FacadesHashids;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('home.home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $postRequest)
    {

        if($postRequest->hasFile('image'))
        {
            $imgpath = $postRequest->file('image')->store('images','public');
        }
        
        Post::create([
            'title' => $postRequest->title,
            'content' => $postRequest->content,
            'user_id' => Auth::id(),
            'image' => $imgpath ?? null ,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $post = Post::with('comments.user')->findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
