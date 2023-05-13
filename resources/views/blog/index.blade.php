@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

    button{
        position:relative;
        top:3%;
        left: 97%;
    }

    .icon{
        position:relative;
        left: 84%;
        top:3%;
    }

    #readButton{
        background-color: black;
    }



</style>

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

<!--Seen chunk method being used: https://stackoverflow.com/questions/58377399/how-to-split-a-foreach-loop-in-laravel-blade-->
@foreach ($posts->chunk(2) as $post)
    <div class="grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        @foreach ($post as $post)
            <div>
                @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                    <form action="/blog/{{ $post->slug }}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')

                        <button class="text-red-500 pr-3" type="submit">
                            <i class="fa fa-trash" style="font-size:27px;"></i>
                        </button>
                    </form>

                    <span class="icon">
                    <a href="/blog/{{ $post->slug }}/edit" style="display: inline;" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        <i class="fa fa-pencil" style="font-size:27px;"></i>
                    </a>
                    </span>
                @endif

                <h2 class="text-gray-700 font-bold text-5xl pb-4 text-center">
                    {{ $post->title }}
                </h2>

                <h3 class="text-xl text-center">
                    About: {{ $post->movieName }}
                </h3>

                <img class="rounded-lg" src="{{ asset('images/' . $post->image_path) }}" alt="" style="width: 1280px; height: 310px;">

                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->description }}
                </p>

                <span class="text-gray-500">
                    By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                </span>
                <br><br><br>
                <div class="text-center">
                <a id="readButton" href="/blog/{{ $post->slug }}" class="uppercase bg-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Keep Reading
                </a>
            </div>
            
            </div>
        @endforeach
    </div>
@endforeach


@endsection