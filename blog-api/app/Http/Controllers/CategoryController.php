<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $category = Category::create(['name' => $request->name]);
        return response()->json($category, 201);
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }

    public function show($id)
    {
        return response()->json(Category::findOrFail($id));
    }

    public function index()
    {
        return response()->json(Category::all());
    }

    public function search($keyword)
    {
        return response()->json(Category::where('name', 'like', "%$keyword%")->get());
    }
}
