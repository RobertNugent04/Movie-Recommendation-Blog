@extends('layouts.app')

@section('content')

<div class="bg-white text-black py-10">
  <div class="container mx-auto">
    <h1 class="text-4xl font-bold text-center border-b-4 border-black pb-2">
      Content to go here
    </h1>
  </div>
</div>

<div class="grid grid-cols-4">
  <div class="col-span-3 bg-gray-200 p-5">
    <div class="container mx-auto">
      <!-- Left Container -->
      <p>Main content</p>
    </div>
  </div>
  <div class="col-span-1 bg-gray-300 p-5">
    <div class="container mx-auto">
      <!-- Right Container -->
      <p>Side content</p>
    </div>
  </div>
</div>

@endsection
