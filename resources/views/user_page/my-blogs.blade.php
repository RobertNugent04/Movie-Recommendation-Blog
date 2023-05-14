@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body text-center">
          <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/default_profile.png') }}" alt="Profile Photo" class="rounded-circle profile-img my-3">
          <h5>{{ Auth::user()->name }}</h5>
          <h3 class="my-3">My Blogs</h3>
          @if($blogs->isEmpty())
          <p>You have no blogs.</p>
          @else
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Blog Name</th>
                <th scope="col">Last Modified</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($blogs as $index => $blog)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $blog->slug }}</td>
                <td>{{ $blog->updated_at->format('d/m/Y') }}</td>
                <td><a href="/blog/{{ $blog->slug }}" style="background-color: #040012; border:none" class="btn btn-primary">View</a></td>
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
