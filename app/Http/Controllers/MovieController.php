<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieController extends Controller
{
    private $apiKey = '8295dbb4116ffc5b458cb9378ac368ea';

    //used to display in the homepage.
    // public function index()
    // {
    //     $apiKey = '8295dbb4116ffc5b458cb9378ac368ea';
    //     $url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $apiKey . '&language=en-US&page=1';
    //     $response = Http::get($url);
    //     $data = json_decode($response->body());

    //     $carouselMovies = array_slice($data->results, 0, 5);
    //     $upNextMovies = array_slice($data->results, 5, 5);

    //     return view('index', [
    //         'carouselMovies' => $carouselMovies,
    //         'upNextMovies' => $upNextMovies
    //     ]);
    // }

    // public function index()
    // {
    //     // Fetching movies
    //     $apiKey = '8295dbb4116ffc5b458cb9378ac368ea';
    //     $url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $apiKey . '&language=en-US&page=1';
    //     $response = Http::get($url);
    //     $data = json_decode($response->body());

    //     $carouselMovies = array_slice($data->results, 0, 5);
    //     $upNextMovies = array_slice($data->results, 5, 5);

    //     // Fetching blog posts
    //     $posts = Post::latest()->paginate(3);

    //     return view('index', [
    //         'carouselMovies' => $carouselMovies,
    //         'upNextMovies' => $upNextMovies,
    //         'posts' => $posts
    //     ]);
    // }

    public function index()
{
    $apiKey = '8295dbb4116ffc5b458cb9378ac368ea';

    // Fetching popular movies
    $url = 'https://api.themoviedb.org/3/movie/popular?api_key=' . $apiKey . '&language=en-US&page=1';
    $response = Http::get($url);
    $data = json_decode($response->body());

    $carouselMovies = array_slice($data->results, 0, 5);
    $upNextMovies = array_slice($data->results, 5, 5);

    // Fetching top rated movies for recommendations
    $recommendations = Review::orderBy('rating', 'desc')
        ->take(6)
        ->get();

    foreach ($recommendations as $recommendation) {
        $searchUrl = "https://api.themoviedb.org/3/search/movie?api_key={$this->apiKey}&query=" . urlencode($recommendation->movie_name);
        $searchResponse = Http::get($searchUrl);
        $searchData = json_decode($searchResponse->body());

        if (count($searchData->results) > 0) {
            $recommendation->movie_details = $searchData->results[0];
        }
    }

    // Fetching blog posts
    $posts = Post::latest()->paginate(3);

    return view('index', [
        'carouselMovies' => $carouselMovies,
        'upNextMovies' => $upNextMovies,
        'posts' => $posts,
        'recommendations' => $recommendations
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

    public function show($id)
    {
        $url = "https://api.themoviedb.org/3/movie/{$id}?api_key={$this->apiKey}&language=en-US";
        $response = Http::get($url);
        $movie = json_decode($response->body());

        $reviews = Review::where('movie_id', $id)->with('user')->get();

        return view('movie', compact('movie', 'reviews'));
    }
}
