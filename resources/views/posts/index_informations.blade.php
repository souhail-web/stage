@extends('posts/index')

<?php
 function trunc($phrase, $max_words)
 {
    $phrase_array = explode(' ',$phrase);
    if(count($phrase_array) > $max_words && $max_words > 0)
       $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
    return $phrase;
 }
?>

@section('contenu')




    <article>

 @foreach ( $posts as $post )
      <div class="row">
        <div class="large-6 columns">
          <p><img src="https://picsum.photos/600/370" alt="image for article"></p>
        </div>
        <div class="large-6 columns">
          <h5><a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }}</a></h5>
          <p>
            <span><i class="fi-torso"> By {{ $post->author->name }} - </i></span>
            <span><i class="fi-calendar"> {{ \Carbon\Carbon::parse($post->post_date)->format('j F,Y') }} &nbsp;&nbsp;</i></span>
            <span><i class="fi-comments">{{--  6 comments --}}</i></span>
          </p>
          <p class="paragraphe"> <?php echo trunc($post->post_content,60) ?> </p>
          <br>
          <p id="suite"><a href="{{ route('posts.show', $post->id) }}"> Read more </a></p>

          <p id="suite"> <i class="fi-torso">
            <?php if (count($post->comments) > 1)
                    echo "<a href='http://127.0.0.1:8000/posts/$post->id/#comments'>".(count($post->comments))." Comments </a>" ;
                  else
                    echo (count($post->comments))." Comment "?>
        </i></p>
        </div>
      </div>

      <hr>

     @endforeach



      </article>

    </div>


  </div>

  {!! $posts->render() !!}

  @endsection

<link rel="stylesheet" href="{{asset('css/test.css')}}">
