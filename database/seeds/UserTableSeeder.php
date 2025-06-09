<?php
// php artisan app:run-legacy-seeder NomDuSeeder
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
{


    User::truncate();

    // Create admin user
    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
    ]);
    $admin->roles()->attach(Role::where('name', 'admin')->first());

    // Create regular user
    $user = User::create([
        'name' => 'Regular User',
        'email' => 'user@example.com',
        'password' => Hash::make('password'),
    ]);
    $user->roles()->attach(Role::where('name', 'user')->first());



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

