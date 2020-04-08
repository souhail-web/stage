@include('layouts/main')
@include('layouts/navbar')
@include('layouts/banniere')

<head>
    <link type="text/css" rel="stylesheet" href={{asset('css/commentaire.css')}}>
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <title> @yield('titrePage')</title>
</head>

<body>

    {{-- Titre d'accueil --}}
    <hr>
    <div class="row column">
        <h4 style="margin: 0;" class="text-center">@yield('titre') </h4>
    </div>
    <hr>

    <div class="container">

        {{-- Mise en page de l'article --}}
        <div class="row">
            <div class="large-12 columns">
                <div class="blog-post">
                    <img class="thumbnail" id="imgArticle" src="https://placehold.it/850x350">
                    {{-- Image de l'article--}}
                    <p>@yield('contenu')</p> {{-- Contenu de l'article--}}
                    <div id="dateArticle">
                        <h3> <small> @yield('date') </small> </h3> {{-- Date de l'article--}}
                    </div>
                    <div>
                        <p><a href="#">By @yield('auteur') </a></p> {{-- Auteur de l'article--}}
                    </div>
                </div>
            </div>
        </div>

        <br> {{-- Saut de ligne pour aérer --}}


        {{-- Mise en page des commentaires --}}
        <div class="comments">

            <div id="comments">
                <h4>Commentaires</h4> {{-- Titre de la section commentaire --}}

                {{-- <div> <p> @yield('nbcommentaires') </p> </div> --}}
            </div>

            {{-- Mise en page de l'article --}}
            @yield('commentaires')

            <hr>


            {{-- Ajout de commentaire --}}
            <div class="row column">
                <h5 style="margin: 0;" class="text-center">Laissez un commentaire </h5>
            </div>


            {{-- Formulaire de commentaire --}}
            <form action="/Articles/@yield('id')" class="contact-form" method="POST">
                {{ csrf_field() }}


                {{-- Formulaire : nom --}}
                <div class="col-sm-6">
                    <div class="input-block" id="nomCommentaire">
                        <label for="">Nom</label>
                        <input name="commentaire_nom" type="text" class="form-control">

                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('commentaire_nom'))
                        <div class="error">
                            <p>{{ $errors->first('commentaire_nom') }}</p>
                        </div>
                        @endif

                    </div>
                </div>


                {{-- Formulaire : email --}}
                <div class="col-sm-12">
                    <div class="input-block" id="emailCommentaire">
                        <label for="">Email</label>
                        <input name="commentaire_email" type="text" class="form-control">

                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('commentaire_email'))
                        <div class="error">
                            <p>{{ $errors->first('commentaire_email') }}</p>
                        </div>
                        @endif

                    </div>
                </div>


                {{-- Formulaire : contenu commentaire --}}
                <div class="col-sm-12">
                    <div class="input-block textarea" id="msgCommentaire">
                        <label for="">Votre commentaire </label>
                        <textarea name="commentaire_msg" rows="3" type="text" class="form-control"></textarea>

                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('commentaire_msg'))
                        <div class="error">
                            <p>{{ $errors->first('commentaire_msg') }}</p>
                        </div>
                        @endif

                    </div>
                </div>


                {{-- Formulaire :bouton d'envoi --}}
                <div class="col-sm-12" id="publier">
                    <button class="square-button">Publier</button>
                </div>
                <br>
            </form>
        </div>
    </div>

</body>

{{-- Mise en page du footer --}}

@include('layouts/footer')

<script>
    //material contact form animation
//material contact form animation
$('.contact-form').find('.form-control').each(function() {
var targetItem = $(this).parent();
if ($(this).val()) {
$(targetItem).find('label').css({
  'top': '10px',
  'fontSize': '14px'
});
}
})
$('.contact-form').find('.form-control').focus(function() {
$(this).parent('.input-block').addClass('focus');
$(this).parent().find('label').animate({
'top': '10px',
'fontSize': '14px'
}, 300);
})
$('.contact-form').find('.form-control').blur(function() {
if ($(this).val().length == 0) {
$(this).parent('.input-block').removeClass('focus');
$(this).parent().find('label').animate({
  'top': '25px',
  'fontSize': '18px'
}, 300);
}
})
</script>
