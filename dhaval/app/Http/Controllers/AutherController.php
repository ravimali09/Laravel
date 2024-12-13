<?php

namespace App\Http\Controllers;
use App\Models\auther;

use Illuminate\Http\Request;

class AutherController extends Controller
{
    
    public function index()
    {
        return response()->json(auther::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $auther = auther::create($validated);
        return response()->json($auther, 201);
    }

    public function show(auther $auther)
    {
        return response()->json($auther);
    }

    public function update(Request $request, auther $auther)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $auther->update($validated);
        return response()->json($auther);
    }

    public function destroy(auther $auther)
    {
        $auther->delete();
        return response()->json(null, 204);
    }
}
