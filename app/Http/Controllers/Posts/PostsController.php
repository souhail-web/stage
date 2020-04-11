<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /*         $posts = Post::latest('post_date')->take(5)->get(); //get all posts
 */
        $posts = Post::orderBy('post_date', 'desc')->paginate(5);

        return view('posts.index_informations', array(
            'posts' => $posts
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // On valide les données envoyées
        $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'content' => 'required|string|min:5|max:2000',
        ]);


        // On créé le post correspondant

        $posts = Post::create([
            'user_id' => Auth::id(),
            'post_title' => request('title'),
            'post_content' => request('content'),
            'post_date' => now(),
            'post_status' => "test",
            'post_name' => "test",
            'post_type' => "test",
            'post_category' => "test",

        ]);


        // On redirige l'utilisateur vers son post fraichement créé avec une notification de réussite (à finir)
        return redirect()->route('posts.show',$posts->id); /* ,[$posts->id]))->with('notification', 'Post created!'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = Post::where('id', $post->id)->first(); //get first post with post_nam == $post_name

        return view('posts/show_informations', compact('posts'));

        // array( //Pass the post to the view
        //   'posts' => $posts
        // ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {

        // On valide les données envoyées
        $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'content' => 'required|string|min:5|max:2000',
        ]);


        // On update le post correspondant

        $posts = DB::table('posts')
              ->where('id', $post->id)
              ->update([
            'post_title' => request('title'),
            'post_content' => request('content'),

        ]);



        // On redirige l'utilisateur vers son post fraichement créé avec une notification de réussite (à finir)
        return redirect()->route('posts.show',$post->id); /* ,[$posts->id]))->with('notification', 'Post created!'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index'); /* ,[$posts->id]))->with('notification', 'Post created!'); */

    }
}
