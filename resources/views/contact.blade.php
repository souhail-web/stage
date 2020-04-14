{{-- Formulaire de contact --}}

@include('layouts/app')
@include('layouts/banniere')

<head>
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
    <main class="py-4">

        <div class="container">
            <hr>
            <h4 class="text-center">CONTACT US</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body bg-light">
                            <form action="/Contact" class="contact-form" method="POST">
                                @csrf


                                {{-- Formulaire à afficher si l'utilisateur est authentifié --}}
                                @if (Auth::check())


                                {{-- Sujet du message --}}
                                <div class="form-group">
                                    <label for="inputAddress">Subject</label>
                                    <input id="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                                </div>

                                {{-- Contenu du message --}}
                                <div class="form-group">
                                    <label for="content">Message</label>
                                    <textarea name="content" type="text" class="form-control textarea"
                                        value="{{ old('content') }}" required required rows="8"></textarea>
                                </div>


                                {{-- Formulaire à afficher si l'utilisateur n'est pas authentifié --}}
                                @else


                                {{-- Nom --}}
                                <div class="form-row">
                                    <div class="form-group col-sm-5">
                                        <label for="name">Name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Your name">
                                    </div>


                                    {{-- Email --}}
                                    <div class="form-group col-sm-7">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Your email">
                                    </div>
                                </div>


                                {{-- Sujet du message --}}
                                <div class="form-group">
                                    <label for="inputAddress">Subject</label>
                                    <input id="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                                </div>

                                {{-- Contenu du message --}}
                                <div class="form-group">
                                    <label for="content">Message</label>
                                    <textarea name="content" type="text" class="form-control textarea"
                                        value="{{ old('content') }}" required required rows="8"></textarea>
                                </div>


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

                                @endif

                                {{-- Bouton d'envoi --}}
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5">Send</button>
                                </div>
                        </div>
                    </div>
    </main>

</body>
