<?php

namespace App\Http\Controllers;
use app\Models\SocietyMember;
use Illuminate\Http\Request;

class SocietyMemberCrontoller extends Controller
{
    public function index()
    {
        $members = SocietyMember::all(); // Get all members
        return view('society_members.index', ['members' => $members]);
    }

    // Store a new society member
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:society_members',
            'phone' => 'required|string',
        ]);

        // Create a new member
        SocietyMember::create($request->all());

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    // Delete a society member
    public function destroy($id)
    {
        $member = SocietyMember::findOrFail($id); // Find the member by ID
        $member->delete(); // Delete the member

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
