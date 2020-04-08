<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class HomeController extends Controller
{
    //

    function index() {

        $posts = \App\Post::latest('post_date')->take(3)->get(); //get all posts

        return view('welcome',array(
            'posts' => $posts
        ));


    }
}


/* class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     **/
 /*   public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 /*   public function index()
    {
        return view('home');
    }
}
*/
