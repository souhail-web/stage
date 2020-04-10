<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function __construct() {

        $this->middleware('auth') ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

/*     $users = User::where('id', Auth::user()->id)->first();

   return view('users.index', array(
                'users'=>$users
        )) ; */
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
/*         $users = User::where('email',$user->email);
        /*         return view('admin.users.index')->with('users',$users) ;

        return view('users.index', array(
                'users'=>$users
        )) ; */

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::where('id', Auth::user()->id)->first();

        return view('users.edit', array(
                     'users'=>$users
             )) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password !== null)
            $user->password = bcrypt($request->password);

        $user->remember_token = $user->setRememberToken("remember_token");

        $user->save();

        return redirect('http://127.0.0.1:8000');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->roles()->detach();
        $user->delete();

        return redirect('http://127.0.0.1:8000');

    }
}
