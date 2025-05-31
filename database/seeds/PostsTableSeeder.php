<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer 10 posts
        factory(Post::class, 10)->create([
            'user_id' => function () {
                // Récupérer un utilisateur aléatoire ou en créer un si nécessaire
                return User::inRandomOrder()->first()->id ?? factory(User::class)->create()->id;
            }
        ]);
    }
}
