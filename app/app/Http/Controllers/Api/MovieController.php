<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TmdbService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = $this->tmdbService->serchMovies($query);
        return response()->json($movies);
    }

    public function show($id)
    {
        $movie = $this->tmdbService->getMovie($id);
        return response()->json($movie);
    }
}
