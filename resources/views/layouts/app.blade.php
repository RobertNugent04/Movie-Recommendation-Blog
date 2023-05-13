<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
    
  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2d3df2f795.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
  .dropdown-menu {
    border: none;
    border-radius: 0;
    background:#040012;
  }
  .dropdown-item {
    color: #ffffff;
  }
      
  .dropdown-item:hover {
    color: #040012;
    background: #ffffff;
  }
      
  .dropdown-item:not(:last-child) {
    border-bottom: 1px solid #6c757d;
  }

  .search-result {
    background-color: #f8f9fa;
    padding: 10px;
    margin-bottom: 5px;
    border-radius: 5px;
  }

    .search-result:hover {
      background-color: #e9ecef;
    }

  .media {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
  }
  .media img {
    margin-right: 10px;
  }
  .media .media-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .movie-title-link {
    text-decoration: none;
    color: #040012;
    font-weight: bold;
  }

  .movie-title-link:hover {
    color: #040012;
  }

  .movie-overview {
    color: #6c757d;
    font-size: 0.9em;
    line-height: 1.5;
    margin-top: 10px;
  }

  .page-link {
    color: #fff;
    background-color: #040012;
    border-color: #040012;
  }

  .page-link:hover {
    color: #040012;
    background-color: #fff;
    border-color: #040012;
  }

  .page-item.active .page-link {
    color: #040012;
    background-color: #fff;
    border-color: #040012;
  }

  .small-title {
    font-size: 0.8rem;
}

  </style>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
  <div id="app">
    <header style="background-color: #040012"  class="py-1">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-4 w-4 mr-2" height="70" width="70">
            <a class="navbar-brand font-bold" href="{{ url('/') }}">RobPat</a>
          </div>
      
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <form class="d-flex mx-auto w-50 my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button style="border: none" class="btn btn-outline-light my-sm-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i></button>
            </form>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/movies">Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/blog">Blogs</a>
              </li>
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="/blog">User Dashboard</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/blog">My Blogs</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/blog">My Reviews</a>
                    </li>
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                      {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
              @endguest
            </ul>
          </div>
        </nav>
      </div>
    </header>
    
    <!-- this is where the search results will be inserted -->
    <div id="search-results-container"></div>
    
    <div>
      @yield('content')
    </div>
    
    <div>
      @include('layouts.footer')
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/search.js') }}" defer></script>
</body>
</html>
