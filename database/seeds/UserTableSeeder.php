<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
{

/*     factory(App\User::class, 10)->create()->each(function ($user) {
        //$user->posts()->save(factory(App\Post::class)->create());
        factory(App\Post::class, 3)->create(['user_id' => $user->id]);
    });
 */

    factory(App\User::class, 10)->create()->each(function ($user) {
        //$user->posts()->save(factory(App\Post::class)->create());
        factory(App\Post::class, 3)->create(['user_id' => $user->id])->each(function($post){
        factory(App\Comment::class,5)->create(['post_id'=>$post->id]);
        });
        /*  factory(App\Comment::class,3)->create(['user_id' =>$user ->id,'post_id' =>random_int(1,10)]); */
     });



   /* factory(App\User::class, 10)->create() ;
     ->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make()) */
    }

}

