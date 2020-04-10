@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Vos informations</div>

                <div class="card-body">

                    {{--                     <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> Nom </th>
                                <th scope="col"> Email </th>
                                <th scope="col"> Rôle </th>
                                <th scope="col"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>


                           <tr>
                                <td> {{ $users->name }}</td>
                    <td> {{ $users->email}} </td>
                    <td> {{ implode(', ', $users->roles()->get()->pluck('name')->toArray()) }} </td>

                    <td>
                        <a href="{{route('admin.users.edit',$users->id)}}">
                            <button class="btn btn-secondary">Editer </button></a>

                    </td>
                    </tr>


                    </tbody>
                    </table> --}}


                    <form action="{{ route('user.users.update', $users)}}" method="post">
                        @csrf
                        @method('PATCH')


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? $users->name }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') ?? $users->email }}" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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
                            <button type="submit" class="btn btn-primary"> Modifier </button>
                        </div>
                </div>
            </div>

            <div class="text-right">

{{--                 <button onclick="confirmer()" class="btn btn-danger  mt-4"> Supprimer mon compte </button>
 --}}                {{-- <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('user.users.destroy',$users->id)}}">Supprimer mon compte</a> --}}

 <form action="{{route('user.users.destroy',$users->id)}}" method="post" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"> Supprimer </button>
</form>
            </div>

        </div>
    </div>
</div>
@endsection

 <script>
/*         function confirmer(){
        var res = confirm("Êtes-vous sûr de vouloir supprimer votre compte ? \n \nVous perdrez tous les articles et commentaires que vous avez publiés. \n");
        if(res){
            // Mettez ici la logique de suppression
        }
    } */

   if(document.getElementById('password') !== null)
   document.getElementById('password').setAttribute("required",true) ;
</script>
