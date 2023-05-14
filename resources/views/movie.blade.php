@extends('layouts.app')

@section('content')
<style>
    .poster-row {
        height: 70vh;
        background: url('https://image.tmdb.org/t/p/original/{{ $movie->backdrop_path }}') no-repeat center center;
        background-size: 100% 100%;
    }
</style>

<div class="container-fluid">
    <!-- Row for movie poster -->
    <div class="row d-none d-md-block poster-row"></div>

    <!-- Row for movie content -->
    <div class="row mb-4" style="background-color: #040012;">
        <div class="col-12 col-md-8">
            <!-- The movie card goes here -->
        </div>

        <div class="col-12 col-md-4 other-content">
            <!-- Other content goes here -->
        </div>
    </div>
</div>
@endsection
