<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callback()
    {
        try {

            $fbUser = Socialite::driver('facebook')->stateless()->user();

            $existUser = User::where('email', $fbUser->email)->first();

            if($existUser){

                Auth::loginUsingId($existUser->id);


                return redirect('/home');

            }else{
                $fbUser = User::create([
                    'name' => $fbUser->name,
                    'email' => $fbUser->email,
                    'facebook_id'=> $fbUser->id,
                    'password' => encrypt('123456dummy'),
                ]);

                $role = Role::select('id')->where('name','user')->first();

                $fbUser->roles()->attach($role);


                $fbUser->save();

                Auth::login($fbUser);

                return redirect('/home');
            }



        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
