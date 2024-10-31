<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class FetchMoviesFromTMDb extends Command
{
    protected $signature = 'fetch:movies';
    protected $description = 'Fetch movies from TMDb API';

    public function handle()
    {
        $client = new Client();

        for ($page = 1; $page <=5 ; $page++) {
            $response = $client->get("https://api.themoviedb.org/3/discover/movie", [
                'query' => [
                    'api_key' => env('TMDB_API_KEY'),
                    'language' => 'ja',
                    'page' => $page,
                ]
            ]);

            $movies = json_decode($response->getBody(), true)['results'];

            foreach ($movies as $movieData) {
                Movie::updateOrCreate(
                    ['tmdb_id' => $movieData['id']],
                    [
                        'title' => $movieData['title'],
                        'overview' => $movieData['overview'],
                        'poster_path' => $movieData['poster_path'],
                        'release_date' => $movieData['release_date']
                    ]
                );
            }
        }
        $this->info('Movies fetched successfully!');
    }
}
