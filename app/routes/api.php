<?php

use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/movies/search', [MovieController::class, 'search']);
// Route::get('/movies/{id}', [MovieController::class, 'show']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/movies/{movie}/favorite', [MovieController::class, 'favorite']);
//     Route::post('/movies/{movie}/review', [MovieController::class, 'review']);
// });

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}', [MovieController::class, 'show']);
