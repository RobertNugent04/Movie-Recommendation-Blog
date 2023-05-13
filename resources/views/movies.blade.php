@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <div class="d-flex justify-content-center">
    <!-- Search form -->
    <form method="GET" action="{{ route('movies') }}">
      <div class="input-group mb-3 mt-3">
        <div>
          <input type="text" class="form-control rounded-pill" placeholder="Search for movies..." name="search">
        </div>
        <div class="col-md-2 col-lg-1">
          <button style="background-color: #040012; border:none; color:white" class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </div>
    </form>
  </div>

  <div class="row justify-content-center">
    @foreach($movies as $movie)
      <div class="col-md-2">
          <div class="card mb-4 rounded-5" style="max-width: 15rem;">
              <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}" class="card-img-top rounded-top" alt="{{ $movie->title }}" style="height: auto; width: 100%;">
              <div class="card-body">
                <h6 class="card-title small-title">{{ $movie->title }}</h6>
                <a style="background-color: #040012; border:none" href="{{ route('movie', ['id' => $movie->id]) }}" class="btn btn-primary btn-sm">View More</a>
              </div>
          </div>
      </div>
  @endforeach
</div>


    <!-- Pagination -->
<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation">
      {{ $movies->onEachSide(2)->links('vendor.pagination.bootstrap-5', ['paginator' => $movies, 'elements' => ['current', 'first', 'last', 'ellipsis', 'adjacent']]) }}
  </nav>
</div>

</div>
@endsection
