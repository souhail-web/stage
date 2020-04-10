<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
    User::truncate();


    factory(App\User::class, 10)->create()->each(function ($user) {
/*         $user->roles()->attach(2);
 */        //$user->posts()->save(factory(App\Post::class)->create());
        $user->roles()->attach(Role::where('name', 'user')->first());
        factory(App\Post::class, 3)->create(['user_id' => $user->id])->each(function($post){
        factory(App\Comment::class,5)->create(['post_id'=>$post->id]);
        });
        /*  factory(App\Comment::class,3)->create(['user_id' =>$user ->id,'post_id' =>random_int(1,10)]); */
     });


        $admin = User::create([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('password')
        ]) ;

        $user = User::create([
            'name'=> 'user',
            'email'=> 'user@user.com',
            'password'=> Hash::make('password')
        ]) ;

        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);


        /* factory(App\User::class, 10)->create() ;
     ->each(function ($user) {
        $user->posts()->save(factory(App\Post::class)->make()) */
    }

}

