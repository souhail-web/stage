@extends('layouts/main')
{{-- <link type="text/css" rel="stylesheet" href={{asset('css/navbar.css')}}>


<body>
    <nav class="navbar">
        <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fas fa-bars"></i>
        </span>
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="http://127.0.0.1:8000/" class="nav-links">Home</a>
            </li>
            <li>
                <a href="#" class="nav-links">About</a>
            </li>
            <li>
                <a href="http://127.0.0.1:8000/Articles" class="nav-links">Articles</a>
            </li>
            <li>
                <a href="http://127.0.0.1:8000/Contact" class="nav-links">Contact</a>
            </li>

            <div class="navbar-right">
                @if (Route::has('login'))
                @auth
                <li> <a href="{{ url('/home') }}">Home</a> </li>
                @else
                <li> <a href="{{ route('login') }}">Login</a> </li>

                @if (Route::has('register'))
                <li> <a href="{{ route('register') }}">Register</a> </li>
                @endif
                @endauth

                @endif
            </div>
        </ul>

    </nav>


    <script>
        let mainNav = document.getElementById("js-menu");
let navBarToggle = document.getElementById("js-navbar-toggle");

navBarToggle.addEventListener("click", function() {
  mainNav.classList.toggle("active");
});

    </script>



</body>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
    integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
</script>
 --}}
{{-- <style>

#top-bar {
    height: 40px;
    background: #ffffff;
    width: 100%;
    position: fixed;
    z-index: 9999;
/*     -webkit-backface-visibility: hidden;
 */    opacity: 1.0;
    -webkit-backface-visibility: hidden;
    border-bottom: 1px solid #dedede;
    -webkit-box-shadow: 1px 1px 2px 2px #dedede;
/*     -moz-box-shadow: 1px 1px 2px 2px #dedede;
    box-shadow: 1px 1px 2px 2px #dedede; */
}

#top-bar .container2 {
    position: relative;
    height: 50px;
    margin: 0 20px;
}
  #nav-wrapper {
    display: inline;
    width: 900px;
    text-transform: uppercase;
    list-style-type: none;

}

#nav-wrapper .menu {
    text-align: center;

}

ol, ul, li {
    list-style: none;

}

#nav-wrapper .menu li {
    display: inline-block;
    margin-right: 30px;
    position: relative;
    line-height: 40px;
}

    </style>

<div id="top-bar">
    <div class="container2">
        <div id="nav-wrapper">
            <ul class="menu-item">
                <li> test </li>
                <li> test </li>
                <li> test </li>
            </ul>
        </div>
    </div>
</div>
 --}}

     <!-- Scripts -->
{{--      <script src="{{ asset('js/app.js') }}" defer></script>
 --}}
     <!-- Fonts -->
{{--      <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
{{--      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

     <!-- Styles -->

     <style>

         </style>


{{--     <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm justify-content-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <nav class="navbar navbar-light navbar-expand-md bg-faded shadow-sm  justify-content-center">
                <a  href="{{ url('/') }}" class="navbar-brand d-flex w-50 mr-auto"> Blog </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Left Side Of Navbar -->
                <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                    <ul class="navbar-nav w-100 justify-content-center">
                        <li class="nav-item active">
                            <a href="http://127.0.0.1:8000/Articles" class="nav-link" >ARTICLES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/" >ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://127.0.0.1:8000/Contact" class="nav-link" >CONTACT</a>
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
      </div>
  </li>
@endguest
</ul>
                </div>
            </nav>
               {{--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </nav> --}}
