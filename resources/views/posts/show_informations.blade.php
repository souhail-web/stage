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
@foreach ($posts->comments as $post)

<div class="usersComments">
    <p id="userName"> {{ $post->comment_name }} </p>
    <p class="comment-text"> {{ $post->comment_content }} </p>
    <div class="comment-date"> {{ $post->comment_date }} </div>
</div>

@endforeach

@endsection
