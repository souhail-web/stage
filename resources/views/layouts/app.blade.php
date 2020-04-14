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


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--     <link rel="stylesheet" href="{{asset('css/test.css')}}">
 --}}
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-light navbar-expand-md bg-faded shadow-sm  justify-content-center">
            <a  href="{{ url('/') }}" class="navbar-brand d-flex w-50 mr-auto"> Blog </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Left Side Of Navbar -->
            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                <ul class="navbar-nav w-100 justify-content-center">
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link" >ARTICLES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutPage') }}" >ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactPage') }}" >CONTACT</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto w-100 justify-content-end">


<!-- Authentication Links -->
@guest
<li class="nav-item">
  <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
</li>
@if (Route::has('register'))
  <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
  </li>
@endif
@else
<li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      {{ Auth::user()->name }} <span class="caret"></span>
  </a>

  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

      @can('manage-users')
      <a class="dropdown-item" href="{{ route('admin.users.index') }}"> Users management </a>
      <a class="dropdown-item" href="{{ route('admin.posts.index') }}"> Posts management </a>
      <a class="dropdown-item" href="{{ route('posts.create') }}"> Write an article </a>


      @endcan

      @can('modify-info')
      <a class="dropdown-item" href="{{ route('user.users.index') }}"> My informations </a>
      <a class="dropdown-item" href="{{ route('user.posts.index') }}"> Posts management </a>
      <a class="dropdown-item" href="{{ route('posts.create') }}"> Write an article </a>

      @endcan


    </div>
</li>
@endguest
</ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
