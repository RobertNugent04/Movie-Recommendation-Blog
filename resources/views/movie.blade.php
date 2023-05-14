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
            <button class="btn btn-light mb-4 mt-2 text-dark btn-read-review">
                <i class="fas fa-comment-alt"></i> Read Review
            </button>
            <div id="review-section" class="mb-4 me-2" style="display: none; height: 300px; overflow-y: scroll;">
                @auth
                <form class="text-center mb-3 d-flex flex-column align-items-center" action="{{ route('reviews.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                    <textarea class="mb-2" name="review" required>{{ __('Make A Review') }}</textarea>
                    <button class="btn btn-light text-dark" type="submit">Submit</button>
                </form>                
                @endauth
                <div id="reviews" class="d-flex flex-column">
                    <!-- Reviews will be loaded here -->
                    <h4 class="text-white text-center">Reviews</h4>
                    @foreach($reviews as $review)
                        <div class="card text-dark bg-light my-2 me-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review->user->name }}</h5>
                                <p class="card-text">{{ $review->review }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>                
            </div>
            <a href="https://www.youtube.com/results?search_query={{ urlencode($movie->title . ' trailer') }}" target="_blank" class="btn btn-light mb-4 text-dark">
                <i class="fas fa-video"></i> Watch Trailer
            </a>            
            <a href="https://www.imdb.com/find?q={{ urlencode($movie->title) }}" target="_blank" class="btn btn-light mb-4 text-dark">
                <i class="fas fa-link"></i> View on IMDb
            </a>            
        </div>
    </div>
</div>

<script>
    document.querySelector('.btn-read-review').addEventListener('click', function() {
        const reviewSection = document.querySelector('#review-section');
        reviewSection.style.display = reviewSection.style.display === 'none' ? 'block' : 'none';
});

</script>

@endsection
