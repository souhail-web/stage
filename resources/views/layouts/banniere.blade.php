{{-- Affichage de la bannière --}}

<div class="banniere text-center">
    <div class="banniere-container">
        <a href="{{ route('accueil') }}" title="Retour à l'accueil">
            <img src="{{asset('assets/image.png')}}" alt="Centre d'Études en Droits Humains et Démocratie (CEDHD)" class="banniere-image">
        </a>
    </div>
</div>

{{-- Inclusion du CSS de la bannière --}}
<link rel="stylesheet" href="{{ asset('css/banniere.css') }}">
