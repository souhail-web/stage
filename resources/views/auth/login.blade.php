@extends('layouts.app')

    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



@section('content')
<div class="container">


    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf

        <div class="heading">Login to laravel blog</div>

        {{-- Partie gauche --}}
        <div class="left">


            {{-- Email --}}
            <label for="email">Email</label> <br />
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            {{-- Affichage de l'erreur --}}
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            {{-- Password --}}
            <label for="password">Password</label> <br />
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">

            {{-- Affichage de l'erreur --}}
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            {{-- Envoi --}}
            <input type="submit" value="Login" />

            {{--  @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
            </a>
            @endif --}}

        </div>

        {{-- Partie droite --}}
        <div class="right">
            <div class="connect">Connect with</div>

            {{-- Facebook --}}
            <a href="{{ url('/auth/facebook') }}" class="facebook">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                <span>Facebook</span>
            </a> <br />

            {{-- Github --}}
            <a href="{{ url('/auth/github') }}" class="github">
                <i class="fab fa-github" aria-hidden="true"></i>
                <span>GitHub</span>
            </a> <br />

            {{-- Google --}}
            <a href="{{ url('auth/google') }}" class="google">
                <i class="fab fa-google" aria-hidden="true"></i>
                <span>Google</span>
            </a>
        </div>


    </form>
</div>

@endsection

