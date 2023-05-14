@extends('layouts.app')

@section('content')
<div class="container mb-4 mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body text-center">
          <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/default_profile.png') }}" alt="Profile Photo" class="rounded-circle profile-img my-3">
          <h5>{{ Auth::user()->name }}</h5>
          <h3 class="my-3">My Reviews</h3>
          @if($reviews->isEmpty())
          <p>You have no reviews.</p>
          @else
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Movie Title</th>
                <th scope="col">Last Modified</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reviews as $index => $review)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $review->movie_name }}</td>
                <td>{{ $review->updated_at->format('d/m/Y') }}</td>
                <td><a href="/movies/{{ $review->movie_id }}" style="background-color: #040012; border:none" class="btn btn-primary">View</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
