<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LearningController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'detail' => 'required|string',
            'helping' => 'boolean',
            'recruiting' => 'boolean',
        ]);

        // $learning = $request->user()->learnings()->create($request->all());
        $user = User::find(1);
        $learning = $user->learnings()->create($request->all());

        return response()->json([
            'learning' => $learning,
        ]);
    }
}
