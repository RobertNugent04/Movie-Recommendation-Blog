@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4">
              <div class="card mb-4" style="max-width: 18rem; max-height: 35rem;">
                <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster_path }}" class="card-img-top" alt="{{ $movie->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <a style="background-color: #040012; border:none" href="{{ route('movie', ['id' => $movie->id]) }}" class="btn btn-primary">View More</a>
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
