<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;


class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function callback()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();

            $existUser = User::where('email', $googleUser->email)->first();
          // OK $finduser = User::where('email', $googleUser->email)->first();
         //   $finduser = User::where('google_id', $googleUser->id)->first();


            if($existUser){

                Auth::loginUsingId($existUser->id);


                return redirect('/home');

            }else{
                 $googleUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id'=> $googleUser->id,
                    'password' => encrypt('123456dummy'),
                ]);

                $role = Role::select('id')->where('name','user')->first();

                $googleUser->roles()->attach($role);


                $googleUser->save();

                Auth::login($googleUser);

                return redirect('/home');
            }



        } catch (Exception $e) {
            dd($e->getMessage());

         /*   return 'error'; */
        }
    }
}
