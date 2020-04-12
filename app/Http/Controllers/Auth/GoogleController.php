<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;
use Laravel\Socialite\Facades\Socialite;


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

                $googleUser->save();

                Auth::login($googleUser);

                return redirect('/home');


               /*  $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;
                $newUser->password = md5(rand(1,10000));
                $newUser->save();
                Auth::loginUsingId($user->id); */

           /*     $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id); */
            }
          //  return redirect()->to('/home');


        } catch (Exception $e) {
           //  dd($e->getMessage());
             @dd(Socialite::driver('google')->user());
         /*   return 'error'; */
        }
    }
}
