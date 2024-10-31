<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function serchMovies($query)
    {
        $response = Http::get("https://api.themoviedb.org/3/search/movie", [
            'api_key' => $this->apiKey,
            'query' => $query,
        ]);

        return $response->json();
    }

    public function getMovie($id)
    {
        $response = Http::get("https://api.themoviedb.org/3/movie/{$id}", [
            'api_key' => $this->apiKey,
        ]);

        return $response->json();
    }
}
