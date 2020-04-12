<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class GithubController extends Controller
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

            $githubUser = Socialite::driver('github')->user();

            $finduser = User::where('email', $githubUser->email)->first();

            if($finduser){

                Auth::loginUsingId($finduser->id);


                return redirect('/home');

            }else{
                /* $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect('/home'); */


                /*  $newUser = new User;
                 $newUser->name = $user->name;
                 $newUser->email = $user->email;
                 $newUser->google_id = $user->id;
                 $newUser->password = md5(rand(1,10000));
                 $newUser->save();
                 Auth::loginUsingId($user->id); */

                $user = new User;
                $user->name = $githubUser->name;
                $user->email = $githubUser->email;
                $user->google_id = $githubUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');


        } catch (Exception $e) {
            dd($e->getMessage());
            /*   return 'error'; */
        }
    }
}
