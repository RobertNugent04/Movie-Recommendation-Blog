@extends('layouts.app')

<style>


h2{
    color:slategray;
}

.flex {
    display: flex;
    background: url('{{ asset('images/' . $post->image_path) }}') no-repeat center center fixed;
    background-size: cover;
}

.content-container {
    width: 50%;
    background: rgba(255, 255, 255, 0.9);
    padding: 5rem;
    word-wrap: break-word;
}

</style>
@section('content')

<div class="flex">
    <div class="content-container">
        <h1 class="text-6xl">{{ $post->title }}</h1>
        <h2 class="text-xl">About: {{ $post->movieName }}</h2>
        <p class="text-xl pt-8 pb-10 leading-8 font-light">{{ $post->description }}</p>
        <span class="text-gray-500 block">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>
    </div>
</div>
@endsection



