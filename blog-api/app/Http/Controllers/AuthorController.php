<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email', 'password' => 'required']);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(Auth::user()->createToken('BlogApp')->accessToken);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens->each(function ($token) {
            $token->delete();
        });
        return response()->json(['message' => 'Logged out successfully']);
    }
}
