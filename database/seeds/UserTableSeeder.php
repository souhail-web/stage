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


    User::truncate();


    factory(App\User::class, 10)->create()->each(function ($user) {

        $user->roles()->attach(Role::where('name', 'user')->first());
        factory(App\Post::class, 3)->create(['user_id' => $user->id])->each(function($post){
        factory(App\Comment::class,5)->create(['post_id'=>$post->id]);
        });
     });



     // création du compte admin et association avec le role correspondant
        $admin = User::create([
            'name'=> 'admin',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('password')
        ]) ;
        $adminRole = Role::where('name','admin')->first();
        $admin->roles()->attach($adminRole);


        // création du compte user et association avec le role correspondant
        $user = User::create([
            'name'=> 'user',
            'email'=> 'user@user.com',
            'password'=> Hash::make('password')
        ]) ;

        $userRole = Role::where('name','user')->first();
        $user->roles()->attach($userRole);


    }

}

