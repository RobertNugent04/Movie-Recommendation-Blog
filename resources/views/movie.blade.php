@extends('layouts.app')

@section('content')
<style>
    .poster-row {
        height: 70vh;
        background: url('https://image.tmdb.org/t/p/original/{{ $movie->backdrop_path }}') no-repeat center center;
        background-size: 100% 100%;
    }
    .card-img-top {
        width: 100%;
        object-fit: cover;
        margin-top: -50px;
    }
    .btn-rating {
        width: 100%;
        margin-top: 20px;
    }
    .card {
        background-color: #040012;
        border: none;
    }
    .other-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    @media (max-width: 576px) {
            .card-img-top {
                margin-top: 0;
            }
        }
</style>

<div class="container-fluid">
    <!-- Row for movie poster -->
    <div class="row d-none d-md-block poster-row"></div>

    <!-- Row for movie content -->
    <div class="row mb-4" style="background-color: #040012;">
        <div class="col-12 col-md-8">
            <!-- The movie card goes here -->
            <div class="card text-white">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}" class="card-img-top" alt="{{ $movie->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">Year: {{ substr($movie->release_date, 0, 4) }}</p>
                            <p class="card-text">Rating: {{ $movie->vote_average }}</p>
                            <p class="card-text">Genres: 
                                @foreach($movie->genres as $genre)
                                    {{ $genre->name }}
                                @endforeach
                            </p>
                            <p class="card-text lh-lg">Overview: {{ $movie->overview }}</p>
                            <button type="button" class="btn btn-light text-dark btn-rating">Rating: {{ $movie->vote_average }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 other-content">
            <!-- Other content goes here -->
        </div>
    </div>
</div>
@endsection
