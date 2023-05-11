@extends('layouts.app3')

@section('content')
<main class="sm:container sm:max-w-lg sm:mt-5 min-h-screen">
    <div class="w-full sm:max-w-md mt-3 px-8 py-4 bg-transparent shadow-md overflow-hidden sm:rounded-lg min-h-screen">
        <div class="mt-6">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-bold text-gray-500">LOG IN BELOW</h2>
                <div class="text-gray-500">or</div>
                <a href="{{ route('login.google') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fab fa-google mr-2"></i> Log in with Google
                </a>
            </div>            
            <h1 class="mt-2 text-4xl font-bold text-gray-100">Access All Amazing Content</h1>
            <p class="mt-4 text-sm font-normal text-gray-500">Don't Have An Account? <a href="/register" class="text-blue-500 hover:text-blue-700">Register</a></p>
        </div>
        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf
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
            <div class="flex items-center">
                <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="ml-2">{{ __('Remember Me') }}</span>
                </label>

                @if (Route::has('password.request'))
                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
            <div>
                <button type="submit" style="background-color: #2563eb; border-radius: 10px" class="mx-auto flex justify-center py-2 px-4 rounded-full text-sm font-medium text-gray-100">
                    Login
                </button>
            </div>            
        </form>
    </div>
</main>
@endsection
