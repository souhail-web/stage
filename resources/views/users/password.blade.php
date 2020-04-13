@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Vos informations</div>

                <div class="card-body">


                  {{--   <form action="{{ route('user.users.password_store', $user)}}" method="post">
                        @csrf
                        @method('PUT')

                         <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"

                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password" value="" confirmed>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password" confirmed
                                    value="">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"> Change my password </button>
                        </div>
                </div>
            </div>

            <div class="text-right">

{{--                 <button onclick="confirmer()" class="btn btn-danger  mt-4"> Supprimer mon compte </button>
 --}}                {{-- <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('user.users.destroy',$users->id)}}">Supprimer mon compte</a>


            </div> --}}




            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1">
                        <form action="{{ route('user.users.password_store',['user' => $user]) }}" method="post">
                            @csrf()
                            @method('PUT')

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change my password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
