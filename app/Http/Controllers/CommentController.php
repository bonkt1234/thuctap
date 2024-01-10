<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'user_id' => 'required|exists:users,user_id',
            'post_id' => 'required|exists:posts,post_id',
        ]);
        Comment::create([
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
        ]);

        return redirect()->back()->with('success', 'Comment created successfully.');
    }
    
}
