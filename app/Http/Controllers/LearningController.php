<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Learning;

class LearningController extends Controller
{
    public function index(Request $request)
    {
        $learnings = Learning::all();

        return response()->json([
            'learnings' => $learnings,
        ]);
    }

    public function show(Request $request, $id)
    {
        $learning = Learning::findOrFail($id);

        return response()->json([
            'learning' => $learning,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'detail' => 'required|string',
            'helping' => 'boolean',
            'recruiting' => 'boolean',
        ]);

        $learning = $request->user()->learnings()->create($request->all());

        return response()->json([
            'learning' => $learning,
        ]);
    }

    public function help(Request $request, $id)
    {
        $learning = Learning::findOrFail($id);

        $learning->helping = !$learning->helping;
        $learning->save();

        return response()->json([
            'learning' => $learning,
        ]);
    }
}
