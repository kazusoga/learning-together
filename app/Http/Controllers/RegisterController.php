<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // ログイン状態にする
        auth()->attempt($request->only('email', 'password'));
        $request->session()->regenerate();

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
}
