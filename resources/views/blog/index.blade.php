@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
        @if (Auth::check())
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/blog/create"
            class="bg-blue-500 uppercase text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif
    </div>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

<div class="row">
    @foreach ($posts as $post)
      <div class="col-md-6 col-lg-6 mb-5">
        <div class="py-15 border-b border-gray-200">
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <form action="/blog/{{ $post->slug }}" method="POST" style="display: inline;">
                @csrf
                @method('delete')

                <button class="text-red-500 ml-au" type="submit" style="float:right;">
                    <i class="fa fa-trash" style="font-size:27px; margin-left:-130px;"></i>
                </button>
            </form>

            <span>
            <a href="/blog/{{ $post->slug }}/edit" style="float:right;" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                <i class="fa fa-pencil icon" style="font-size:27px; margin-left:-130px;"></i>
            </a>
            </span>
        @endif
          <div class="text-center">
            <h2 class="text-gray-700 font-bold text-3xl pb-4">
              {{ $post->title }}
            </h2>
  
            <h3 class="text-xl">
              About: {{ $post->movieName }}
            </h3>
  
            <img class="rounded-lg blog-image mx-auto" src="{{ asset('images/' . $post->image_path) }}" alt="Blog Image" width="500" height="300">
  
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
              {{ $post->description }}
            </p>
  
            <span class="text-gray-500">
              By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
  
            <br><br><br><br>
  
            <div class="mt-6">
              <a id="readButton" href="/blog/{{ $post->slug }}" class="uppercase bg-500 text-gray-100 text-lg font-extrabold py-3 px-6 rounded-3xl" style="background-color: #040012">
                Keep Reading
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--If 2 posts are displayed, start a new row-->
      @if ($loop->iteration % 2 == 0)
        </div><div class="row">
      @endif
    @endforeach
  </div>

@endsection