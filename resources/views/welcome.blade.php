@extends('layouts/accueil')
{{-- <link type="text/css" rel="stylesheet" href={{asset('css/article.css')}}> --}}
<style>
    /* .column, .columns {
    float: left;
    padding-left: .9375rem;
    padding-right: .9375rem;
}*/
</style>


@section('ici')


{{--      @foreach ( $posts as $post )


    <div class ="card">
        <div class="thumbnail"><img class="left" src="https://cdn2.hubspot.net/hubfs/322787/Mychefcom/images/BLOG/Header-Blog/photo-culinaire-pexels.jpg" /></div>
        <div class="right">
            <h1> <a href = "http://127.0.0.1:8000/Articles"{{ $post->id }}> {{ $post->post_title }}</a></h1>
<div class="author"><img src="https://randomuser.me/api/portraits/men/95.jpg" />
    <h2>{{ $post->author->name }}</h2>
</div>
<div class="separator"></div>
<p>{{ $post->post_content }}</p>
</div>
<h5>{{ \Carbon\Carbon::parse($post->post_date)->format('j') }}</h5>
<h6>{{ \Carbon\Carbon::parse($post->post_date)->format('F,Y') }}
</h6>
</div>

@endforeach

@endsection --}}
<?php
 function trunc($phrase, $max_words)
 {
    $phrase_array = explode(' ',$phrase);
    if(count($phrase_array) > $max_words && $max_words > 0)
       $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
    return $phrase;
 }
?>

<div class="row">
    <div class="large-12 columns">

        <article>

            @foreach ( $posts as $post )
            <div class="row">
                <div class="large-6 columns">
                    <p><img src="https://placehold.it/600x370&amp;text=Look at me!" alt="image for article"></p>
                </div>
                <div class="large-6 columns">
                    <h5><a href="http://127.0.0.1:8000/Articles/{{ $post->id }}">{{ $post->post_title }}</a></h5>
                    <p>
                        <span><i class="fi-torso"> By {{ $post->author->name }} - </i></span>
                        <span><i class="fi-calendar"> {{ \Carbon\Carbon::parse($post->post_date)->format('j F,Y') }}
                                &nbsp;&nbsp;</i></span>
                        <span><i class="fi-comments">{{--  6 comments --}}</i></span>
                    </p>
                    <p class="paragraphe"> <?php echo trunc($post->post_content,60) ?> </p>
                    <br>
                    <p id="suite"><a href="http://127.0.0.1:8000/Articles/{{ $post->id }}"> Lire la suite </a></p>

                    <p id="suite"> <i class="fi-torso">
                        <?php if (count($post->comments) > 1)
                                echo "<a href='http://127.0.0.1:8000/Articles/$post->id/#comments'>".(count($post->comments))." Commentaires </a>" ;
                              else
                                echo (count($post->comments))." Commentaire "?>
                    </i></p>
                </div>
            </div>

            <hr>

            @endforeach



        </article>

    </div>


</div>

@endsection

<link rel="stylesheet" href="{{asset('css/test.css')}}">
