@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
          <div class="mt-4">
            <h4>Movie Overview</h4>
            <h3 id="title" class="text-4xl font-semibold text-blue mb-4">{{ $carouselMovies[0]->title }}</h3>
            <p id="overview" class="text-lg text-gray-200 leading-relaxed">{{ $carouselMovies[0]->overview }}</p>
            <a href="#" style="background-color: #040012; border:none" class="btn btn-primary py-2 px-4 rounded-lg mt-4 text-white">See Movie</a>
        </div>
        
      </div>
      <div class="col-md-4">
          <h4>Up Next</h4>
          <ul class="list-unstyled">
              @foreach($upNextMovies as $movie)
              <li class="media mb-3">
                <a style="color: #040012" href="/movies/{{ $movie->id }}" class="d-flex text-decoration-none">
                    <img src="https://image.tmdb.org/t/p/w92/{{ $movie->poster_path }}" class="align-self-start mr-3" alt="{{ $movie->title }}">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ $movie->title }}</h5>
                        <p>{{ \Carbon\Carbon::parse($movie->release_date)->format('Y') }}</p>
                    </div>
                </a>
            </li>            
              @endforeach
          </ul>
      </div>
  </div>

  <div class="row">
    <div class="col-md-6 mx-auto">
      {{-- for the blogs over here --}}
      <h1 class="text-center" style="border: 5px solid black;padding: 10px;">Blog Posts</h1>
      @foreach ($posts as $post)
        <div class="py-15 border-b border-gray-200" style="overflow:hidden;">
          <div class="text-center">
            <h2 class="text-gray-700 font-bold text-3xl pb-4">
              {{ $post->title }}
            </h2>
  
            <h3 class="text-xl">
              About: {{ $post->movieName }}
            </h3>
  
            <img class="rounded-lg blog-image mx-auto" src="{{ asset('images/' . $post->image_path) }}" alt="Blog Image" width="1000" height="600">
  
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
              {{ $post->description }}
            </p>
  
            <span class="text-gray-500">
              By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>

            <br><br><br><br>
  
            <div class="mt-6">
              <a id="readButton" href="/blog/{{ $post->slug }}" class="uppercase bg-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl" style="background-color: #040012; text-decoration:none;">
                Keep Reading
              </a>
            </div>
          </div>
        </div>
      @endforeach
  
      <br><br>
      <div class="text-center">
        <a id="readButton" href="/blog" class="uppercase bg-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl" style="background-color: blue; text-decoration:none;">
          View More
        </a>
      </div>
      <br><br><br><br>
    </div>
    {{-- for the recommendations over here --}}
    <div class="col-6">

    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      let carouselElement = document.getElementById('carouselMovies');
      let overviewElement = document.getElementById('overview');
      let titleElement = document.getElementById('title');
      let overviews = {!! json_encode(collect($carouselMovies)->pluck('overview')) !!};
      let titles = {!! json_encode(collect($carouselMovies)->pluck('title')) !!};


      carouselElement.addEventListener('slide.bs.carousel', function(event) {
          let currentSlideIndex = event.to;
          overviewElement.innerText = overviews[currentSlideIndex];
          titleElement.innerText = titles[currentSlideIndex];
      });
  });
</script>
@endsection
