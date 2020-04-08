<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //

    function index() {

/*         $posts = Post::latest('post_date')->take(5)->get(); //get all posts
 */
        $posts=Post::orderBy('post_date','desc')->paginate(5);

        return view('articles',array(
            'posts' => $posts
        ));
    }

    public function show($id) {
        $posts = \App\Post::where('id',$id)->first(); //get first post with post_nam == $post_name

        return view('posts/single',compact('posts'));

        // array( //Pass the post to the view
          //   'posts' => $posts
       // ));
     }




}
