@extends('layouts.app3')

@section('content')
<main class="sm:container sm:max-w-lg sm:mt-5 min-h-screen">
    <div class="w-full sm:max-w-md mt-3 px-8 py-4 bg-transparent shadow-md overflow-hidden sm:rounded-lg min-h-screen">
        <div class="mt-6">
            <h2 class="text-sm font-bold text-gray-500">SIGN UP FOR FREE</h2>
            <h1 class="mt-2 text-4xl font-bold text-gray-100">Create new Account</h1>
            <p class="mt-4 text-sm font-normal text-gray-500">Already A Member? <a href="/login" class="text-blue-500 hover:text-blue-700">Log In</a></p>
        </div>
        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <div class="flex-wrap">
                    <label class="text-sm font-medium text-gray-100">
                        {{ __('Name') }}
                        <input type="text" id="name" name="name" required style="background-color: #2B2B36;" class="mt-1 block w-full rounded shadow-sm py-2 px-3 text-base text-white sm:text-sm @error('name')  border-red-500 @enderror" autofocus>
                    </label>
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="flex-wrap">
                <label class="text-sm font-medium text-gray-100">
                    {{ __('E-Mail Address') }}
                    <input type="email" id="email" name="email" required style="background-color: #2B2B36;" class="mt-1 block w-full rounded shadow-sm py-2 px-3 text-base sm:text-sm @error('email') border-red-500 @enderror" value="{{ old('email') }}" autocomplete="email">
                </label>
                @error('email')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex-wrap">
                <label class="text-sm font-medium text-gray-100">
                    {{ __('Password') }}
                    <input type="password" id="password" name="password" required style="background-color: #2B2B36;" class="mt-1 block w-full rounded shadow-sm py-2 px-3 text-base sm:text-sm @error('password') border-red-500 @enderror" autocomplete="new-password">
                </label>
                @error('password')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="flex-wrap">
                <label class="text-sm font-medium text-gray-100">
                    {{ __('Confirm Password') }}
                    <input type="password" id="password-confirm" name="password-confirm" required style="background-color: #2B2B36;" class="mt-1 block w-full rounded shadow-sm py-2 px-3 text-base sm:text-sm" autocomplete="new-password">
                </label>
            </div>  
            <div>
                <button type="submit" style="background-color: #2563eb; border-radius: 10px" class="mx-auto flex justify-center py-2 px-4 rounded-full text-sm font-medium text-gray-100">
                    Create Account
                </button>
            </div>            
        </form>
    </div>
</main>
@endsection
