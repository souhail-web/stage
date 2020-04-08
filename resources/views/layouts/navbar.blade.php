@extends('layouts/main')
<link type="text/css" rel="stylesheet" href={{asset('css/navbar.css')}}>


<body>
    <nav class="navbar">
        <span class="navbar-toggle" id="js-navbar-toggle">
            <i class="fas fa-bars"></i>
        </span>
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="http://127.0.0.1:8000/" class="nav-links">Home</a>
            </li>
            <li>
                <a href="#" class="nav-links">About</a>
            </li>
            <li>
                <a href="http://127.0.0.1:8000/Articles" class="nav-links">Articles</a>
            </li>
            <li>
                <a href="http://127.0.0.1:8000/Contact" class="nav-links">Contact</a>
            </li>
        </ul>
    </nav>


<script>
            let mainNav = document.getElementById("js-menu");
let navBarToggle = document.getElementById("js-navbar-toggle");

navBarToggle.addEventListener("click", function() {
  mainNav.classList.toggle("active");
});

        </script>



</body>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
            integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
        </script>

{{-- <style>

#top-bar {
    height: 40px;
    background: #ffffff;
    width: 100%;
    position: fixed;
    z-index: 9999;
/*     -webkit-backface-visibility: hidden;
 */    opacity: 1.0;
    -webkit-backface-visibility: hidden;
    border-bottom: 1px solid #dedede;
    -webkit-box-shadow: 1px 1px 2px 2px #dedede;
/*     -moz-box-shadow: 1px 1px 2px 2px #dedede;
    box-shadow: 1px 1px 2px 2px #dedede; */
}

#top-bar .container2 {
    position: relative;
    height: 50px;
    margin: 0 20px;
}
  #nav-wrapper {
    display: inline;
    width: 900px;
    text-transform: uppercase;
    list-style-type: none;

}

#nav-wrapper .menu {
    text-align: center;

}

ol, ul, li {
    list-style: none;

}

#nav-wrapper .menu li {
    display: inline-block;
    margin-right: 30px;
    position: relative;
    line-height: 40px;
}

    </style>

<div id="top-bar">
    <div class="container2">
        <div id="nav-wrapper">
            <ul class="menu-item">
                <li> test </li>
                <li> test </li>
                <li> test </li>
            </ul>
        </div>
    </div>
</div>
 --}}
