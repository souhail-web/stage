{{-- Affichage de la section "ABOUT" --}}

@include('layouts/app')
@include('layouts/banniere')

<head>
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <title> About </title>
</head>

<body>

    <main class="py-4">

    <div class="container">
        <hr>
        <h4 class="text-center">ABOUT - CENTRE D'ÉTUDES EN DROITS HUMAINS ET DÉMOCRATIE (CEDHD)</h4>
        <hr>


        {{-- Mise en page de l'article --}}
        <div class="row">
            <div class="large-12 columns">
                <div class="blog-post">
                    {{-- Image de l'article--}}
                    <img class="thumbnail" id="imgArticle" src="https://picsum.photos/850/350">
                    {{-- Contenu de l'article--}}
                    <div class="col text-center">
                    <h4> <small> Centre d'Études en Droits Humains et Démocratie (CEDHD) <br> Plateforme d'information et de documentation sur les droits humains - Développée par Souhail</small></h4>
                    </div>
                    <p>  Pour ce projet nous
                        avons décidé
                        d'implémenter plusieurs fonctionnalités qui sont les suivantes : </p>
                    <ul>
                        <li> Ajout de rôles utilisateurs : un admin et un user.
                            <ul>
                                <li> Un utilisateur qui s’enregistre aura le rôle user par défaut. </li>
                                <li>Seul l’administrateur peut changer le rôle d’un utilisateur. </li>
                                <li>Le rôle user peut uniquement gérer ses articles, les commentaires de ses articles et
                                    son profil. </li>
                                <li>Le rôle admin peut accéder à toutes les parties de l'administration </li>
                            </ul>
                        </li>

                        <li> Gestion des commentaires : formulaire de commentaires sous les articles (et/ou) les pages
                            permettant de soumettre un
                            commentaire. La liste de commentaires est ensuite affichée sous le formulaire.
                            <ul>
                                <li>
                                    Les admins peuvent seulement supprimer les commentaires, ils ne peuvent pas les
                                    modifier. </li>
                                <li> Les autheurs des articles peuvent eux aussi supprimer les commentaires </li>
                                <li> Les utilisateurs à l'origine du commentaire peuvent à la fois l'éditer et le
                                    supprimer </li>
                            </ul>
                        </li>
                        <li> CRUD complet des articles. Le CRUD est différents selon les autorisations accordées aux
                            utilisateurs en fonction de leur role
                            <ul>
                                <li> Un admin peut gérer tous les posts : il peut les lire, les éditer et les supprimer
                                </li>
                                <li> Un utilisateur peut gérer tous SES posts : il peut les lire, les éditer & les
                                    supprimer </li>
                                <li> Seul un utilisateur authentifié peut écrire un article </li>
                            </ul>
                        </li>
                        <li> Identification / Authentification qui protège l'accès à l’administration : authentification
                            et protection de certaines parties de l’application.

                            <ul>
                                <li> Les admins peuvent gérer les utilisateurs et les posts. Pour les utilisateurs ils
                                    peuvent modifier leurs informations générales
                                    ainsi que leurs rôles, ils peuvent aussi décider de supprimer un utilisateur. Pour
                                    ce qui est des posts, cela rejoint le principe du CRUD
                                    évoqué plus haut. </li>
                                <li> Les utilisateurs peuvent modifier leurs propres informations (nom, adresse mail et
                                    mot de passe). Ils peuvent aussi gérer le CRUD de
                                    leurs articles </li>
                            </ul>
                        </li>
                    </ul>


                    </ol>
                    <div id="dateArticle">{{-- Date de l'article--}}
                        <h3> <small> 15 avril 2025 </small> </h3>
                    </div>
                    <div>
                        <p><a>By Souhail </a></p> {{-- Auteur de l'article--}}
                    </div>
                </div>
            </div>
        </div>
    </main>
        <br> {{-- Saut de ligne pour aérer --}}


          {{-- Mise en page du footer --}}
@include('layouts/footer')
