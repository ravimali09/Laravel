<?php

namespace App\Http\Controllers;
use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    
    public function index()
    {
        return response()->json(article::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $article = article::create($validated);
        return response()->json($article, 201);
    }

    public function show(article $article)
    {
        return response()->json($article);
    }

    public function update(Request $request, article $article)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $article->update($validated);
        return response()->json($article);
    }

    public function destroy(article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
