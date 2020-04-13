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
        <h4 class="text-center">CONTACT US</h4>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{--  <div class="card-header"> Contact us</div> --}}

                    <div class="card-body bg-light">
                        <form action="/Contact" class="contact-form" method="POST">
                            @csrf

                            @if (Auth::check())

                            <div class="form-group">
                                <label for="inputAddress">Subject</label>
                                <input id="subject" type="text"
                                    class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="content">Message</label>
                                <textarea name="content" type="text" class="form-control textarea" value="{{ old('content') }}" required
                                  required rows="8"></textarea>
                            </div>

                            @else

                            <div class="form-row">
                                <div class="form-group col-sm-5">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Your name">

                                </div>


                                <div class="form-group col-sm-7">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Your email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Subject</label>
                                <input id="subject" type="text"
                                    class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    value="{{ old('subject') }}" required autocomplete="subject" autofocus>
                            </div>


                            <div class="form-group">
                                <label for="content">Message</label>
                                <textarea name="content" type="text" class="form-control textarea" value="{{ old('content') }}" required
                                  required rows="8"></textarea>
                            </div>


                            @endif

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg pl-5 pr-5">Send</button>
                            </div>
                    </div>
                </div>
            </main>

</body>
