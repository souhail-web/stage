<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function traitement($id)
    // traitement du formulaire
    {
        // on verifie que les données insérées sont correctes
        request()->validate([
            'commentaire_nom' => ['required', 'string'],
            'commentaire_email' => ['required', 'email'],
            'commentaire_msg' => ['required', 'string'],
        ]);

        // on créé le contact dans la table correspondante
        $contact = Comment::create([
            'post_id' => $id,
            'comment_name' => (request('commentaire_nom')),
            'comment_email' => request('commentaire_email'),
            'comment_content' => request('commentaire_msg'),
            'comment_date' => now(),
        ]);


        return redirect()->route('posts.show',$id);    }
}
