@extends('layouts.app')

<!-- Styles -->
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<!-- Font Awesome 5 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


@section('content')
<div class="container">
    <form method="POST" action="{{ route('register') }}" id="login-form">
        @csrf

        <div class="heading">Inscription au blog</div>

        {{-- Partie gauche --}}
        <div class="left">

            {{-- Name --}}
            <label for="name">Nom</label> <br />
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            {{-- Afficahge de l'erreur --}}
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            {{-- Email --}}
            <label for="email">Email</label> <br />
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

            {{-- Affichage de l'erreur --}}
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- Password --}}
            <label for="password">Mot de passe</label> <br />
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            {{-- Afficahge de l'erreur --}}
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            {{-- Confirmation du password --}}
            <label for="password-confirm">Confirmer le mot de passe</label> <br />
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">


            {{-- Bouton d'envoi --}}
            <input type="submit" value="S'inscrire" />
        </div>


        {{-- Partie droite --}}
        <div class="right">
            <div class="connect">S'inscrire avec</div>

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

            <p class="text-justify"> Si vous vous inscrivez via Google ou GitHub, veuillez changer votre mot de passe dans "Mes informations"
                 dans votre profil pour pouvoir vous connecter ultérieurement au site via la connexion traditionnelle.
                 Sinon, vous devrez toujours utiliser ces services pour vous connecter.
            </p>
        </div>

    </form>
</div>



</div>

@endsection
