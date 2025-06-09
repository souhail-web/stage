{{-- Page affichée une fois le formulaire de contact envoyé --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-check-circle mr-2"></i> Message envoyé avec succès</h4>
                </div>
                <div class="card-body py-5">
                    <div class="text-center mb-4">
                        <div class="mb-4">
                            <i class="fas fa-envelope-open-text fa-4x text-success"></i>
                        </div>
                        <h2 class="mb-4">Merci pour votre message !</h2>
                        <p class="lead">Nous avons bien reçu votre demande et nous vous répondrons dans les plus brefs délais.</p>
                    </div>
                    <hr class="my-4">
                    <div class="text-center">
                        <p>Vous serez contacté via l'adresse email que vous avez fournie.</p>
                        <div class="mt-4">
                            <a href="{{ route('contactPage') }}" class="btn btn-outline-secondary mr-2">
                                <i class="fas fa-paper-plane mr-1"></i> Envoyer un autre message
                            </a>
                            <a href="{{ url('/') }}" class="btn btn-primary">
                                <i class="fas fa-home mr-1"></i> Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Redirection automatique après 10 secondes
    setTimeout(function() {
        window.location.href = "{{ url('/') }}";
    }, 10000);
</script>
@endsection
