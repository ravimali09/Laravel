<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['comment' => 'required', 'article_id' => 'required']);
        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }

    public function update($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $comment->update(['comment' => $request->comment]);
        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(null, 204);
    }

    public function show($id)
    {
        return response()->json(Comment::findOrFail($id));
    }

    public function index()
    {
        return response()->json(Comment::all());
    }
}
