@include('layouts/app')
@include('layouts/banniere')

  <main class="py-4">
<div class="container">
    <hr>
    <h4 style="margin: 0;" class="text-center">ARTICLES</h4>
    <hr>
    <article>


        {{-- Boucle pour afficher chaque post --}}
        @foreach ( $posts as $post )
        <div class="row">
            <div class="large-6 columns">

                {{-- Affichage de l'image aléatoirement --}}
                <p><img src="https://picsum.photos/id/<?php echo randomImage() ?>/600/370" alt="image for article"></p>
            </div>
            <div class="large-6 columns">

                {{-- Affichage du titre avec lien --}}
                <h5><a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }}</a></h5>
                <p>
                    {{-- Affichage de l'auteur --}}
                    <span><i class="fi-torso"> By {{ $post->author->name }} - </i></span>

                    {{-- Affichage de la date --}}
                    <span><i class="fi-calendar"> {{ \Carbon\Carbon::parse($post->post_date)->format('j F,Y') }}
                            &nbsp;&nbsp;</i></span>
                </p>

                {{-- Affichage du contenu de l'article tronqué --}}
                <p class="paragraphe"> <?php echo trunc($post->post_content,60) ?> </p>
                <br>

                {{-- Lire la suite de l'article --}}
                <p id="suite"><a href="{{ route('posts.show', $post->id) }}"> Read more </a></p>


                {{-- Affichage du nombre de commentaires sous l'article --}}
                <p id="suite"> <i class="fi-torso">
                        <?php if (count($post->comments) > 1)
                    echo "<a href='http://localhost:8000/posts/$post->id/#comments'>".(count($post->comments))." Comments </a>" ;
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

{{-- Pagination --}}
<div class="row justify-content-center">
{!! $posts->render() !!}
</div>

<link rel="stylesheet" href="{{asset('css/test.css')}}">


</div>
  </main>


  {{-- Mise en page du footer --}}
@include('layouts/footer')
