@extends('layouts.app')

@section('content')

<style>
    .btn-custom {
      background-color: white;
      color: black;
      border: 1px solid black;
      border-radius: 50%;
      padding: 0.5rem 1rem;
      width: 6rem;
    }

    input{
        margin-left: 1rem;
    }

    input:hover{
        cursor: pointer;
    }

    </style>
    

    <div class="container ml-2 mt-4 p-6">
        <div class="flex justify-between items-center">
          <h1 class="text-4xl font-bold" style="margin-left: 1rem;">Movies</h1>
          <input type="text" placeholder="Search" class="px-4 py-2 mr-3">
        </div>

      <div class="flex flex-row mt-4 ml-2">
        <input type="button" value="Action" class="btn btn-custom mb-2">
        <input type="button" value="Thriller" class="btn btn-custom mb-2">
        <input type="button" value="Drama" class="btn btn-custom mb-2">
        <input type="button" value="Fantasy" class="btn btn-custom mb-2">
        <input type="button" value="Horror" class="btn btn-custom mb-2">
        <input type="button" value="Romance" class="btn btn-custom mb-2">
      </div>
    </div>

@endsection
