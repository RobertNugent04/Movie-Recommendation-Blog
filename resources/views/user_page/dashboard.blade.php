@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/default_profile.png') }}"
             alt="Profile Photo"
             class="rounded-circle my-4"
             width="150"
             height="150">
    </div>
    <div class="text-center">
        <h2>{{ Auth::user()->name }}</h2>
    </div>

    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="needs-validation mb-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Profile Photo:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label fst-italic">New Password (leave blank to keep current password):</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" style="background-color: #040012; border:none" class="btn btn-primary">Update Profile</button>
        </div>
    </form>
    
</div>
@endsection
