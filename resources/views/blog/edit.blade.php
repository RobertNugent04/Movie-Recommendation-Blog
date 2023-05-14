@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl text-center">
            Update Post
        </h1>
    </div>
</div>

<div class="m-auto bg-white rounded-lg shadow-lg p-8 md:w-3/4 lg:w-2/5" style="padding: 30px; max-width: 800px;">
    <form 
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex flex-col mb-6">
            <label for="title" class="mb-2 text-lg">Blog Title</label>
        <input 
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="w-full px-4 py-2 border rounded-lg">
            @error('title')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>
        <br>

        <div class="flex flex-col mb-6">
            <label for="movieName" class="mb-2 text-lg">Subject</label>
            <input 
            type="text"
            name="movieName"
            value="{{ $post->movieName }}"
            class="w-full px-4 py-2 border rounded-lg"
            >
            @error('movieName')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>
        <br>

        <div class="flex flex-col mb-6">
        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"
            >{{ $post->description }}</textarea>
            @error('description')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>


        <div class="flex justify-center">
            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" style="background-color: black"
            >
                Update Post
            </button>
        </div>
    </form>
</div>
<br><br>

@endsection