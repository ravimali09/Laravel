<?php

namespace App\Http\Controllers;
use app\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function show($id)
    {
        $user = customer::find($id);
        return view('user.profile', compact('user'));
    }
     // Show the user's profile
     public function profile()
     {
         $user = Auth::user(); // Get the currently authenticated user
         return view('profile', ['user' => $user]);
     }
 
     // Update the user's profile
     public function update(Request $request)
     {
         $user = Auth::user();
 
         // Validate incoming data
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255|unique:users,email,' . $user->id,
             'password' => 'nullable|min:8|confirmed',
         ]);
 
         // Update user profile
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         
         // If password is provided, update it
         if ($request->filled('password')) {
             $user->password = bcrypt($request->input('password'));
         }
 
         $user->save(); // Save changes
 
         return redirect()->route('profile')->with('success', 'Profile updated successfully.');
     }
}
