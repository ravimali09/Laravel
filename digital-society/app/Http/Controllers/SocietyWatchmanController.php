<?php

namespace App\Http\Controllers;
use app\Models\watchman;
use Illuminate\Http\Request;

class SocietyWatchmanController extends Controller
{
    public function index()
    {
        $watchmen = Watchman::all(); // Get all watchmen
        return view('watchmen.index', ['watchmen' => $watchmen]);
    }

    // Add a new watchman
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string',
        ]);

        // Create a new watchman
        Watchman::create($request->all());

        return redirect()->route('watchmen.index')->with('success', 'Watchman added successfully.');
    }

    // Delete a watchman
    public function destroy($id)
    {
        $watchman = Watchman::findOrFail($id);
        $watchman->delete();

        return redirect()->route('watchmen.index')->with('success', 'Watchman removed successfully.');
    }
}
