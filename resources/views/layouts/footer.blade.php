{{-- Affichage du footer moderne pour le CEDHD --}}

<footer class="footer-section bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Colonne 1: Logo et description -->
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Centre d'Études en Droits Humains et Démocratie</h5>
                <p class="small">Fondé en 2025, le CEDHD est une organisation dédiée à la promotion et la protection des droits humains et des valeurs démocratiques à travers la recherche, l'information et l'action.</p>
            </div>
            
            <!-- Colonne 2: Liens rapides -->
            <div class="col-md-3 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('accueil') }}" class="text-white">Accueil</a></li>
                    <li class="mb-2"><a href="{{ route('aboutPage') }}" class="text-white">À propos</a></li>
                    <li class="mb-2"><a href="/posts" class="text-white">Articles</a></li>
                    <li class="mb-2"><a href="{{ route('contactPage') }}" class="text-white">Contact</a></li>
                </ul>
            </div>
            
            <!-- Colonne 3: Informations de contact -->
            <div class="col-md-3 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fa fa-map-marker mr-2"></i> 123 Avenue de la Démocratie, Rabat, Maroc</li>
                    <li class="mb-2"><i class="fa fa-phone mr-2"></i> +212 5XX-XXXXXX</li>
                    <li class="mb-2"><i class="fa fa-envelope mr-2"></i> contact@cedhd.org</li>
                </ul>
            </div>
            
            <!-- Colonne 4: Réseaux sociaux -->
            <div class="col-md-2 mb-4">
                <h5 class="text-uppercase font-weight-bold mb-4">Suivez-nous</h5>
                <div class="social-links">
                    <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="row mt-4 pt-3 border-top">
            <div class="col-md-6 text-md-left text-center small">
                <p>&copy; 2025 Centre d'Études en Droits Humains et Démocratie (CEDHD). Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-md-right text-center small">
                <p>Développé par <a href="#" class="text-white">Souhail</a> avec Laravel 10</p>
            </div>
        </div>
    </div>
</footer>

<!-- Ajout des icônes Font Awesome pour les réseaux sociaux -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
