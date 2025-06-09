{{-- Affichage du post --}}

@include('layouts/app')

<head>
    <link type="text/css" rel="stylesheet" href={{asset('css/commentaire.css')}}>
    <link rel="stylesheet" href="{{asset('css/test.css')}}">


    <!--intégration du reCaptcha !-->
    {!! NoCaptcha::renderJs() !!}

    {{-- Mise en page du captcha --}}
    <style>
        .text-xs-center {
            text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }
    </style>

</head>

<body>

    {{-- Titre d'accueil --}}
    <div class="container">
        <hr>
        <h4 class="text-center">@yield('titre') </h4>
        <hr>


        {{-- Mise en page de l'article --}}
        <div class="row">
            <div class="large-12 columns">
                <div class="blog-post">
                    <img class="thumbnail" id="imgArticle" src="https://picsum.photos/850/350">
                    {{-- Image de l'article--}}
                    <p>@yield('contenu')</p> {{-- Contenu de l'article--}}
                    <div id="dateArticle">
                        <h3> <small> @yield('date') </small> </h3> {{-- Date de l'article--}}
                    </div>
                    <div>
                        <p><a href="#">Par @yield('auteur') </a></p> {{-- Auteur de l'article--}}
                    </div>
                </div>
            </div>
        </div>

        <br> {{-- Saut de ligne pour aérer --}}


        @can('edit-article',$posts)
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <a href="{{ route('posts.edit', $posts->id)}}"> <button class="btn btn-primary m-1">
                    Modifier </button>
            </a>
            <form method="post" action="{{ route('posts.destroy', $posts->id) }}" }>
                @csrf @method('delete')
                <button type="submit" class="btn btn-danger m-1">
                    Supprimer
                </button>
            </form>
        </div>
        @endcan

        <br>

        {{-- Mise en page des commentaires --}}
        <div class="comments">

            <div id="comments">
                <h4>Commentaires</h4> {{-- Titre de la section commentaire --}}
            </div>

            {{-- Mise en page de l'article --}}
            @yield('commentaires')

            <hr>


            {{-- Ajout de commentaire --}}

            <h4 class="text-center">Ajouter un commentaire </h4>

            {{-- Formulaire de commentaire --}}
            <form method="post" action="{{ route('comments.store') }}">

                @csrf


                {{-- Formulaire à afficher si l'utilisateur est connecté --}}

                @if(Auth::check())

                <label for="content" class="col-sm-12 text-center mt-5" style="clear: both;">Commentaire</label>
                <div class="control" style="clear: both;">
                    <textarea name="content" class="textarea w-100 p-3" placeholder="commentaire" minlength="5" required=""
                        rows="2"></textarea>
                </div>
        </div>
        <input type="hidden" name="postID" value="{{ $posts->id }}">


        {{-- Bouton d'envoi --}}
        <div class="text-center pb-3"><button type="submit" class="btn btn-primary"> Publish </button></div>

        </form>


                        {{-- Formulaire à afficher si l'utilisateur n'est pas connecté --}}

        @else


        {{-- Nom --}}
        <div class="form-group">
            <div class="control" style="float: left;width: 35%;">
                <label for="title" class="col-sm-12 text-center">Nom</label>
                <input type="text" name="name" value="" class="input w-100 p-3" placeholder="nom" minlength="2"
                    maxlength="100" required="">
            </div>

            {{-- Email --}}
            <div class="control" style="float: right;width: 60%;">
                <label for="title" class="col-sm-12 text-center">Email</label>
                <input type="email" name="email" value="" class="input w-100 p-3" placeholder="email" minlength="5"
                    maxlength="100" required="">
            </div>


            {{-- Commentaire --}}
            <label for="content" class="col-sm-12 text-center" style="clear: both;">Commentaire</label>
            <div class="control" style="clear: both;">
                <textarea name="content" class="textarea w-100 p-3" placeholder="commentaire" minlength="5" required=""
                    rows="2"></textarea>
            </div>
        </div>

        {{-- Envoi du numéro du post pour simplifier l'intégration en BDD --}}
        <input type="hidden" name="postID" value="{{ $posts->id }}">


        {{-- Afficahge du captcha --}}
        <div class="form-group text-center ml-6">
            {!! NoCaptcha::display() !!}

            {{-- Affichage de l'erreur du captcha --}}
            @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
            @endif
        </div>

        {{-- Bouton d'envoi --}}
        <div class="text-center pb-3"><button type="submit" class="btn btn-primary"> Publish </button></div>

        </form>

        @endif
    </div>
    </div>

</body>


{{-- Mise en page du footer --}}
@include('layouts/footer')
