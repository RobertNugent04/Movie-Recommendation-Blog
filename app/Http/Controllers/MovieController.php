<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
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

}
