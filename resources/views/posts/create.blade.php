{{-- Création d'un post --}}

@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" >
                <div class="card-header text-center"> Créer un nouvel article </div>

                <div class="card-body">


                    <form method="post" action="{{ route('posts.store') }}">

                        @csrf
                        @include('partials.errors')

                            <div class="form-group">
                                <div class="control">
                                <label for="title" class="col-sm-12 text-center">Titre</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="input w-100 p-3"
                                    placeholder="Titre" minlength="5" maxlength="100" required />
                                <small class="form-text text-muted"> Max 100 caractères</small>
                                </div>



                                <label for="content" class="col-sm-12 text-center">Contenu</label>
                                 <div class="control">
                                    <textarea name="content" class="textarea w-100 p-3" placeholder="Contenu" minlength="5"
                                       class="input w-100 p-3" required rows="10">{{ old('content') }}</textarea>
                                </div>
                            </div>


                            <div class="text-center pb-3"><button type="submit" class="btn btn-primary"> Publier </button></div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
        @endsection
