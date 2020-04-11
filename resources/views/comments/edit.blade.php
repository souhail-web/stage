@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modification de votre commentaire : {{ $comment->comment_content }} </div>

                <div class="card-body">


                    <form action="{{ route('comments.update', $comment->id )}}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('partials.errors')

                        <div class="form-group">

                        <label for="content" class="col-sm-12 text-center">Content</label>
                        <div class="control">
                            <textarea name="content" class="textarea w-100 p-3" placeholder="Content" minlength="5"
                                required rows="10">{{ $comment->comment_content }}</textarea>

                        </div>

                        <div class="text-center pb-1"><button type="submit" class="btn btn-primary"> Update </button></div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
