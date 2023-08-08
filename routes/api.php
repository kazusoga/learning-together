<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/learnings', 'App\Http\Controllers\LearningController@index');
Route::get('/learnings/{id}', 'App\Http\Controllers\LearningController@show');
Route::post('/learnings', 'App\Http\Controllers\LearningController@create');
Route::put('/learnings/{id}/help', 'App\Http\Controllers\LearningController@help');
