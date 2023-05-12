@extends('layouts.blogApp')

<style>

h1{
    color:white;
}

h2{
    color:slategray;
}

p{
    color:white;
}

    </style>

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
        <h2 class="text-xl">
            About: {{ $post->movieName }}
        </h2>
        <p class="text-xl pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>
    </div>
</div>

<div class="w-4/5 m-auto pt-1">

    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

</div>

@endsection 