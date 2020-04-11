<?php

namespace App\Http\Controllers\Comments;

use App\Comment;
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  // traitement du formulaire


        // on verifie que les données insérées sont correctes
        $request->validate([
            'name' => 'required|string|unique:posts|min:2|max:100',
            'email' => ['required', 'email'],
            'content' => ['required', 'string'],
        ]);

        // on créé le commentaire dans la table correspondante
         $comment = Comment::create([
            'post_id' => $request->postID,
            'comment_name' => $request->name,
            'comment_email' => $request->email,
            'comment_content' => $request->content,
            'comment_date' => now(),
        ]);


        return redirect()->route('posts.show',$request->postID);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        // on verifie que les données insérées sont correctes
        $request->validate([
            'content' => ['required', 'string'],
        ]);

        // on créé le commentaire dans la table correspondante

        $comments = DB::table('comments')
        ->where('id', $comment->id)
        ->update([
            'comment_content' => $request->content,
            'comment_date' => now(),
        ]);



        return redirect()->route('posts.show',$comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show',$comment->post_id);

    }
}
