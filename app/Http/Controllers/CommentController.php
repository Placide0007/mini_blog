<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentController extends Controller
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
    public function store(StoreCommentRequest $request, Post $post)
    {

        $userId = Auth::id();

        if (!$userId) {
            $userId = $this->getAnonymousUserId();
        }

        // Créer le commentaire
        $comment = Comment::create([
            'comment' => $request->comment,
            'post_id' => $post->id,
            'user_id' => $userId,
        ]);


        $comment->load('user');

        return response()->json([
            'comment' => $comment
        ], 201);
    }

    private function getAnonymousUserId()
    {

        return 0;
    }
}
