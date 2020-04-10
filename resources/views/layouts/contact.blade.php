@include('layouts/app')

{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
<link type="text/css" rel="stylesheet" href={{asset('css/formulaire.css')}}>



<body>

    <section class="container">
        <h1> Formulaire de contact
            <small>Des questions ? Besoin d'information ? Contactez-nous</small>
        </h1>
        <section class="contact-wrap">
            <form action="/Contact" class="contact-form" method="POST">
                {{ csrf_field() }}

                <div class="col-sm-6" id="nomContact">
                    <div class="input-block">
                        <label for="">Nom</label>
                        <input name="contact_nom" type="text" class="form-control">
                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('contact_nom'))
                        <div class="error">
                            <p>{{ $errors->first('contact_nom') }}</p>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="col-sm-6" id="prenomContact">
                    <div class="input-block">
                        <label for="">Prénom</label>
                        <input name="contact_prenom" type="text" class="form-control">
                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('contact_prenom'))
                        <div class="error">
                            <p>{{ $errors->first('contact_prenom') }}</p>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-block" id="emailContact">
                        <label for="">Email</label>
                        <input name="contact_email" type="text" class="form-control" >
                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('contact_email'))
                        <div class="error">
                            <p>{{ $errors->first('contact_email') }}</p>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-block">
                        <label for="">Objet du message</label>
                        <input name="contact_objet" type="text" class="form-control">
                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('contact_objet'))
                        <div class="error">
                            <p>{{ $errors->first('contact_objet') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="input-block textarea">
                        <label for="">Votre message </label>
                        <textarea name="contact_msg" rows="3" type="text" class="form-control"></textarea>
                        {{-- Affichage de l'erreur  --}}
                        @if($errors->has('contact_msg'))
                        <div class="error">
                            <p>{{ $errors->first('contact_msg') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12">
                    <button class="square-button">Envoyer</button>
                </div>
            </form>
        </section>
    </section>

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
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" >--}}



</body>
