<?php

/**
 * Retourne la phrase tronquée avec le nombre de mots définis
 *
 * @param string $phrase
 *      phrase à tronquer
 * @param int $max_words
 *      nombre de mot maximum
 * @return string
 *      phrase tronquée
**/


 function trunc($phrase, $max_words)
 {
    $phrase_array = explode(' ',$phrase);
    if(count($phrase_array) > $max_words && $max_words > 0)
       $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
    return $phrase;


 }

 /**
 * Retourne le numéro de l'image à afficher
 *
 * @return int
 *     chiffre aléatoire entre 1047 et 1084
**/

 function randomImage()
 {

    return rand(1047,1084);

 }

?>



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
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Styles personnalisés -->
    <style>
        /* Styles personnalisés pour la navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.7rem 1rem;
            background-color: #343a40 !important; /* Même couleur que bg-dark */
        }
        
        .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 1.7rem;
            letter-spacing: 2px;
            padding: 5px 15px;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.1);
            margin-right: 20px;
        }
        
        .navbar-brand .text-primary {
            color: #ffffff !important;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .navbar-brand:hover .text-primary {
            color: #ffffff !important;
        }
        
        .nav-link {
            font-weight: 600;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            border-radius: 4px;
            margin: 0 10px;
            color: rgba(255, 255, 255, 0.85) !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white !important;
        }
        
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white !important;
            font-weight: 700;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
        }
        
        .dropdown-item {
            padding: 0.5rem 1.5rem;
            transition: background-color 0.2s ease;
        }
        
        .dropdown-header {
            font-weight: 700;
            color: #3490dc;
        }
        
        /* Styles pour le corps du site */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        
        /* Styles pour les titres */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <span class="font-weight-bold text-primary">CEDHD</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navigation principale -->
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                                <i class="fas fa-home mr-1"></i> Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/posts" class="nav-link {{ Request::is('posts*') && !Request::is('posts/create') ? 'active' : '' }}">
                                <i class="fas fa-newspaper mr-1"></i> Publications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('About') ? 'active' : '' }}" href="{{ route('aboutPage') }}">
                                <i class="fas fa-info-circle mr-1"></i> À propos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('Contact') ? 'active' : '' }}" href="{{ route('contactPage') }}">
                                <i class="fas fa-envelope mr-1"></i> Contact
                            </a>
                        </li>
                    </ul>
                    <!-- Authentication Links -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt mr-1"></i> {{ __('Connexion') }}
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus mr-1"></i> {{ __('Inscription') }}
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="navbarDropdown">
                                <div class="dropdown-header">Mon compte</div>
                                
                                @can('modify-info')
                                <a class="dropdown-item" href="{{ route('user.users.index') }}">
                                    <i class="fas fa-id-card mr-2"></i> Mes informations
                                </a>
                                <a class="dropdown-item" href="{{ route('user.posts.index') }}">
                                    <i class="fas fa-file-alt mr-2"></i> Mes publications
                                </a>
                                @endcan
                                
                                <a class="dropdown-item" href="{{ route('posts.create') }}">
                                    <i class="fas fa-edit mr-2"></i> Rédiger un article
                                </a>
                                
                                @can('manage-users')
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Administration</div>
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users-cog mr-2"></i> Gestion des utilisateurs
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.posts.index') }}">
                                    <i class="fas fa-newspaper mr-2"></i> Gestion des publications
                                </a>
                                @endcan
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Déconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>


</html>
