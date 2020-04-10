<?php

use App\Contact;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
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

    factory(Contact::class, 10)->create();



   /* factory(App\User::class, 10)->create() ;
     ->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make()) */
    }

}

