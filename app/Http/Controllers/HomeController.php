<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class HomeController extends Controller
{
    //

    function index() {

         $posts = Post::latest('post_date')->take(3)->get(); //get all posts

        return view('welcome',array(
            'posts' => $posts
        ));

    }

    function indexAbout() {

        return view('about');
    }
}

