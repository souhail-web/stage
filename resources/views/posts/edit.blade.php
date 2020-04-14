{{-- Edition d'un post --}}

@extends('layouts/app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"> Edit article : {{ $post->post_title }} </div>

                <div class="card-body">

                    <form method="post" action="{{ route('posts.update', $post->id) }}">

                        @csrf
                        @method('PATCH')
                        @include('partials.errors')

                        <div class="form-group">
                            <div class="control">
                                <label for="title" class="col-sm-12 text-center">Title</label>
                                <input type="text" name="title" value="{{ $post->post_title }}" class="input w-100 p-3"
                                    placeholder="Title" minlength="5" maxlength="100" required />

                                <small class="form-text text-muted"> Max 100 caractères</small>
                            </div>


                            <label for="content" class="col-sm-12 text-center">Content</label>
                            <div class="control">
                                <textarea name="content" class="textarea w-100 p-3" placeholder="Content" minlength="5"
                                   required rows="10">{{ $post->post_content }}</textarea>

                            </div>
                        </div>


                        <div class="text-center pb-3">
                            <button class="square-button" type="submit">Envoyer</button>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
