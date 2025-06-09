@include('layouts/app')
@include('layouts/banniere')


<main class="py-4">

<div class ="container">
<hr>
    <h4 class="text-center">CENTRE D'ÉTUDES EN DROITS HUMAINS ET DÉMOCRATIE (CEDHD)</h4>
<hr>

<div class="row">
    <div class="large-12 columns">

        <article>


            @foreach ( $posts as $post )

            <div class="row">
                <div class="large-6 columns">
                    <p><img {{-- "https://picsum.photos/600/370"  --}}src="https://picsum.photos/id/<?php echo randomImage() ?>/600/370" alt="image for article"></p>
                </div>
                <div class="large-6 columns">
                    <h5><a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }}</a></h5>
                    <p>
                        <span><i class="fi-torso"> Par {{ $post->author->name }} - </i></span>
                        <span><i class="fi-calendar"> {{ \Carbon\Carbon::parse($post->post_date)->format('j F,Y') }}
                                &nbsp;&nbsp;</i></span>
                    </p>
                    <p class="paragraphe"> <?php echo trunc($post->post_content,60) ?> </p>
                    <br>
                    <p id="suite"><a href="{{ route('posts.show', $post->id) }}"> Lire la suite </a></p>

                    <p id="suite"> <i class="fi-torso">
                        <?php if (count($post->comments) > 1)
                                echo "<a href='http://localhost:8000/posts/$post->id/#comments'>".(count($post->comments))." Commentaires </a>" ;
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



<link rel="stylesheet" href="{{asset('css/test.css')}}">


</div>
</main>
@include('layouts/footer')




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




