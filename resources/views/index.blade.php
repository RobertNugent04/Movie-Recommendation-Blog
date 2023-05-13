@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row">
      <div class="col-md-8">
          <div id="carouselMovies" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  @foreach($carouselMovies as $index => $movie)
                      <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                          <img src="https://image.tmdb.org/t/p/w500/{{ $movie->backdrop_path }}" class="d-block w-100" alt="{{ $movie->title }}">
                          <div class="carousel-caption d-none d-md-block">
                              <h5>{{ $movie->title }}</h5>
                          </div>
                      </div>
                  @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselMovies" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselMovies" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
      </div>
      <div class="col-md-4">
          <h4>Up Next</h4>
          <ul class="list-unstyled">
              @foreach($upNextMovies as $movie)
                  <li class="media mb-3">
                      <img src="https://image.tmdb.org/t/p/w92/{{ $movie->poster_path }}" class="align-self-start mr-3" alt="{{ $movie->title }}">
                      <div class="media-body">
                          <h5 class="mt-0 mb-1">{{ $movie->title }}</h5>
                          <p>{{ \Carbon\Carbon::parse($movie->release_date)->format('Y') }}</p>
                      </div>
                  </li>
              @endforeach
          </ul>
      </div>
  </div>
</div>
@endsection
