@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15">
        <h1 class="text-6xl">
            Create A Post
        </h1>
    </div>
</div>

<div class="m-auto bg-white rounded-lg shadow-lg p-8 md:w-3/4 lg:w-2/5" style="padding: 30px; max-width: 800px;">
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col mb-6">
            <label for="title" class="mb-2 text-lg">Blog Title</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Title..."
                class="w-full px-4 py-2 border rounded-lg"
            >
            @error('title')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col mb-6">
            <label for="movieName" class="mb-2 text-lg">Subject</label>
            <input
                type="text"
                name="movieName"
                placeholder="Movie Name..."
                class="w-full px-4 py-2 border rounded-lg"
            >
            @error('movieName')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col mb-6">
            <textarea
                name="description"
                placeholder="Description..."
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"
            ></textarea>
            @error('description')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>
        <br><br>

        <div class="bg-grey-lighter mb-6">
            <label class="flex items-center justify-center px-2 py-3 bg-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select an image
                </span>
                <input
                    type="file"
                    name="image"
                    class="hidden"
                >
            </label>
            @error('image')
            <p style="color:red;" class="text-red-700 text-lg font-bold">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-center">
            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" style="background-color: black"
            >
                Submit Post
            </button>
        </div>
    </form>
</div>
<br><br>

@endsection
