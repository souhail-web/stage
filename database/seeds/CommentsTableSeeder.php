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
                $commentCount = rand(2, 5);
                
                for ($i = 1; $i <= $commentCount; $i++) {
                    Comment::create([
                        'post_id' => $post->id,
                        'comment_name' => 'Commenter ' . $i,
                        'comment_email' => 'commenter' . $i . '@example.com',
                        'comment_content' => 'This is comment ' . $i . ' for the post "' . $post->post_title . '". Lorem ipsum dolor sit amet.',
                        'comment_date' => now()->subDays(rand(1, 15))
                    ]);
                }
            });
        }
    }
}
