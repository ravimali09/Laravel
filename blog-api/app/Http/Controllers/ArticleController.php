<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required', 'category_id' => 'required']);
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(null, 204);
    }

    public function show($id)
    {
        return response()->json(Article::findOrFail($id));
    }

    public function index()
    {
        return response()->json(Article::all());
    }

    public function search($keyword)
    {
        return response()->json(Article::where('title', 'like', "%$keyword%")->get());
    }
}
