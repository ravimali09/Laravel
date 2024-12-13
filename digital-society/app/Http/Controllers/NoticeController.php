<?php

namespace App\Http\Controllers;
use app\Models\notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::all(); // Get all notices
        return view('notices.index', ['notices' => $notices]);
    }

    // Create and store a new notice
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Notice::create($request->all());

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    // Delete a notice
    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
