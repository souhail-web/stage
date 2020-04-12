<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class GitHubController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return void
    */
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }


    public function callback()
    {
        try {

            $githubUser = Socialite::driver('github')->stateless()->user();

            $existUser = User::where('email', $githubUser->email)->first();

            if($existUser){

                Auth::loginUsingId($existUser->id);


                return redirect('/home');

            }else{

                $githubUser = User::create([
                    'name' => $githubUser->getName(),
                    'email' => $githubUser->email,
                    'github_id'=> $githubUser->id,
                    'password' => encrypt('123456dummy'),
                ]);


                $role = Role::select('id')->where('name','user')->first();

                $githubUser->roles()->attach($role);

                $githubUser->save();

                Auth::login($githubUser);

                return redirect('/home');

            }


        } catch (Exception $e) {
            dd($e->getMessage());

             /*   return 'error';  */
        }
    }
}
