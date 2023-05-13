<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    private $apiKey = '8295dbb4116ffc5b458cb9378ac368ea';

    //used to display in the homepage.
    public function index()
    {
        $apiKey = '8295dbb4116ffc5b458cb9378ac368ea';
        $url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $apiKey . '&language=en-US&page=1';
        $response = Http::get($url);
        $data = json_decode($response->body());

        $carouselMovies = array_slice($data->results, 0, 5);
        $upNextMovies = array_slice($data->results, 5, 5);

        return view('index', [
            'carouselMovies' => $carouselMovies,
            'upNextMovies' => $upNextMovies
        ]);
    }

    public function movies(Request $request)
    {
        $page = $request->get('page', 1);
        $searchQuery = $request->get('search', '');
        $url = $searchQuery
            ? "https://api.themoviedb.org/3/search/movie?api_key={$this->apiKey}&language=en-US&query={$searchQuery}&page={$page}"
            : "https://api.themoviedb.org/3/movie/popular?api_key={$this->apiKey}&language=en-US&page={$page}";

        $response = Http::get($url);
        $data = json_decode($response->body());

        // Create a new Laravel paginator instance.
        $movies = new LengthAwarePaginator(
            $data->results,
            $data->total_results,
            20, // The number of items per page. TMDb API returns 20 items per page.
            $page,
            ['path' => route('movies')] // The base URL for the paginator links. Replace 'movies' with the actual route name for this controller method.
        );

        return view('movies', compact('movies'));
    }
}
