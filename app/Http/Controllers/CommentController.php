<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'content' => 'required|string',
        ]);

        $request['user_id'] = auth()->id();

        Comment::create($request->only('news_id', 'content', 'user_id'));

        return redirect()->route('news.show', $request->news_id)->with('success', 'Comment added successfully.');
    }
}
