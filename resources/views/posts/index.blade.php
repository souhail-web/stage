@include('layouts/app')
@include('layouts/banniere')

<?php
 function trunc($phrase, $max_words)
 {
    $phrase_array = explode(' ',$phrase);
    if(count($phrase_array) > $max_words && $max_words > 0)
       $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
    return $phrase;
 }

 function randomImage()
 {

    return rand(1047,1084);

 }

?>
  <main class="py-4">
<div class="container">
    <hr>
    <h4 style="margin: 0;" class="text-center">ARTICLES</h4>
    <hr>
    <article>

        @foreach ( $posts as $post )
        <div class="row">
            <div class="large-6 columns">
                <p><img src="https://picsum.photos/id/<?php echo randomImage() ?>/600/370" alt="image for article"></p>
            </div>
            <div class="large-6 columns">
                <h5><a href="{{ route('posts.show', $post->id) }}">{{ $post->post_title }}</a></h5>
                <p>
                    <span><i class="fi-torso"> By {{ $post->author->name }} - </i></span>
                    <span><i class="fi-calendar"> {{ \Carbon\Carbon::parse($post->post_date)->format('j F,Y') }}
                            &nbsp;&nbsp;</i></span>
                    <span><i class="fi-comments">{{--  6 comments --}}</i></span>
                </p>
                <p class="paragraphe"> <?php echo trunc($post->post_content,60) ?> </p>
                <br>
                <p id="suite"><a href="{{ route('posts.show', $post->id) }}"> Read more </a></p>

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

<div class="row justify-content-center">
{!! $posts->render() !!}
</div>

<link rel="stylesheet" href="{{asset('css/test.css')}}">


</div>
  </main>

@include('layouts/footer')

{{-- <head>
       <style>


/*Just the background stuff*/
/* span.s1 {
	position : absolute;
	top : 0;
	font-size : 15rem;
	font-weight : 800;
	text-transform : uppercase;
	color : #3C4447;
}
span.s2 {
	font-weight : 800;
	position : absolute;
	bottom : 0;
	right : 0;
	font-size : 15rem;
	text-transform : uppercase;
	color : #3C4447;
} */
/*My hum... body.. yeah..*/
/* body {
	background-color: #353B3F;
	font-family: 'Roboto', sans-serif;
} */
/* The card */
.container {
    width: 1080px;
    margin: 0 auto;
}

.card{
/* 	position : relative;
 */	height: 450px;
	width: 900px;
 	margin : 100px auto;
	background-color : #FFF;
	-webkit-box-shadow: 10px 10px 93px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 93px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 93px 0px rgba(0,0,0,0.75);
}
/* Image on the left side */
.thumbnail {
	float : left;
	position : relative ;
	left : 30px;
	top : -30px;
	height : 320px;
	width : 530px;
	-webkit-box-shadow: 10px 10px 60px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 60px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 60px 0px rgba(0,0,0,0.75);
	overflow: hidden
/*object-fit: cover;*/
/*object-position: center;*/
}
img.left {
	position: absolute;
	left: 50%;
	top: 50%;
	height: auto;
	width: 100%;
	-webkit-transform: translate(-50%,-50%);
	-ms-transform: translate(-50%,-50%);
	transform: translate(-50%,-50%);
}
/* Right side of the card */
.right {
	margin-left : 590px;
	margin-right : 20px;
}
h1 {
	padding-top : 15px;
	font-size : 1.3rem;
	color : #4B4B4B;
}
.author{
	background-color : #9ECAFF;
	height : 30px;
	width : 210px;
	border-radius : 20px;

}
.author>img{
	padding-top : 5px;
    padding-right : 15px;
	margin-left : 10px;
	float : left;
	height : 20px;
	width : 20px;
	border-radius : 50%;
}
h2{
	padding-top : 8px;
	margin-right : 6px;
    text-align : left;
	font-size : 0.8rem;
	color :white;
}
.separator{
	margin-top : 10px;
	border : 1px solid #C3C3C3;
}
p{
	text-align: justify;
	padding-top : 10px;
	font-size : 0.95rem;
	line-height: 150%;
	color : #4B4B4B;
}
/* DATE of release*/
h5{
	position : absolute;
	left : 30px;
	bottom : -120px;
	font-size : 6rem;
	color : #C3C3C3;
}
h6{
	position : absolute;
	left : 30px;
	bottom : -55px;
	font-size : 2rem;
	color : #C3C3C3;
}
/* Those futur buttons */
ul{
	margin-left : 250px;
}
 .container li{
	display: inline;
	list-style: none;
	padding-right: 40px;
	color : #7B7B7B;
}
/* Floating action button */
.fab{
	position : absolute;
	right : 50px;
	bottom : -40px;
	box-sizing: border-box;
	padding-top: 18px;
	background-color : #1875D0;
	width : 80px;
	height : 80px;
	color : white;
	text-align : center;
	border-radius : 50%;
	-webkit-box-shadow: 10px 10px 50px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 50px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 50px 0px rgba(0,0,0,0.75);
}
    </style>
</head>
<body>
    <h1> Welcome ! </h1>
    @yield('ici')
    <div class="container">
    <div class="card">
        <div class="thumbnail"><img class="left" src="https://cdn2.hubspot.net/hubfs/322787/Mychefcom/images/BLOG/Header-Blog/photo-culinaire-pexels.jpg" /></div>
        <div class="right">
            <h1>@yield('titre')</h1>
            <div class="author"><img src="https://randomuser.me/api/portraits/men/95.jpg" />
                <h2>@yield('auteur')</h2>
            </div>
            <div class="separator"></div>
            <p>@yield('contenu')</p>
        </div>
        <h5>@yield('dateJour')</h5>
        <h6>@yield('dateMois')</h6>
{{--         <ul>
            <li><i class="fa fa-eye fa-2x"></i></li>
            <li><i class="fa fa-heart-o fa-2x"></i></li>
             <li><i class="fa fa-envelope-o fa-2x"></i></li>
            <li><i class="fa fa-share-alt fa-2x"></i></li>s
    </ul>
    </div>

</div>
</body>
</html> --}}
