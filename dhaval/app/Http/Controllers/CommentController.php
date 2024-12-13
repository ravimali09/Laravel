<?php

namespace App\Http\Controllers;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function index()
    {
        return response()->json(comment::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $comment = comment::create($validated);
        return response()->json($comment, 201);
    }

    public function show(Comment $comment)
    {
        return response()->json($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $comment->update($validated);
        return response()->json($comment);
    }

    public function destroy(comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}
