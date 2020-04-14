@extends('posts/show')

{{-- On définit le titre de la page avec le titre de l'article --}}
@section('titrePage')
{{ $posts->post_title }}
@endsection


{{-- On définit l'id de l'article --}}
@section('id')
{{ $posts->id }}
@endsection


{{-- On définit la date de l'article --}}
@section('date')
{{ \Carbon\Carbon::parse($posts->post_date)->format('j F Y') }}
@endsection


{{-- On définit le titre de l'article --}}
@section('titre')
{{ $posts->post_title }}
@endsection


{{-- On définit l'auteur de l'article --}}
@section('auteur')
{{ $posts->author->name }}
@endsection


{{-- On définit le contenu de l'article --}}
@section('contenu')
{{ $posts->post_content }}
@endsection


{{-- On définit le nombre de commentaires de l'article --}}
@section('nbcommentaires')
<?php echo (count($posts->comments))." Commentaires" ; ?>
@endsection


{{-- On définit la section commentaire de l'article --}}
@section('commentaires')

{{-- On itère sur chaque commentaire de l'article et on créé le commentaire --}}
@foreach ($posts->comments as $comment)

<div class="usersComments">
    <p id="userName"> {{ $comment->comment_name }} </p>
    <p class="comment-text"> {{ $comment->comment_content }} </p>
    <div class="comment-date"> {{ $comment->comment_date }} </div>



    <div class="btn-group btn-group-toggle" data-toggle="buttons">

        {{-- Edition du commentaire si les parametres utilisateur l'y autorise --}}
      @can('edit-comment',$comment)<a href="{{ route('comments.edit', $comment->id)}}" > <button class="btn btn-primary m-1">
                Edit </button> </a>
      @endcan

      {{-- Supression du commentaire si les parametres utilisateur l'y autorise --}}
    @can('delete-comment',$comment)

        <form method="post" action="{{ route('comments.destroy', $comment->id) }}">
            @csrf @method('delete')
            <button type="submit" class="btn btn-danger m-1">
                Delete
            </button>
        </form>
    @endcan


    @if(Auth::check() && Auth::user()->id == $posts->user_id)
    <form method="post" action="{{ route('comments.destroy', $comment->id) }}">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger m-1">
            Delete
        </button>
    </form>
    @endif

</div>

</div>

@endforeach

@endsection
