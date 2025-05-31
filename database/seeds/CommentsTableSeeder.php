<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérer tous les posts
        $posts = Post::all();
        
        if ($posts->count() > 0) {
            // Pour chaque post, créer entre 2 et 5 commentaires
            $posts->each(function ($post) {
                factory(Comment::class, rand(2, 5))->create([
                    'post_id' => $post->id
                ]);
            });
        }
    }
}
