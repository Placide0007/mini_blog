<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $commentRequest , $postid)
    {
        Comment::create([
            'content' => $commentRequest->content,
            'user_id' => Auth::id(),
            'post_id' => $postid,
        ]);

        return redirect()->route('posts.show', $postid);
    }
}
