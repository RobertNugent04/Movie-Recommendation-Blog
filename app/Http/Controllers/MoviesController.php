<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        return view('movies');
    }
}
