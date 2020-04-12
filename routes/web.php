<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */

Auth::routes();

Route::get('/', 'HomeController@index')->name('accueil');


Route::get('About','HomeController@indexAbout')->name('aboutPage');


Route::get('Contact','ContactController@index')->name('contactPage');

Route::post('Contact', 'ContactController@traitement');


Route::get('/Login', 'HomeController@index');


Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('users', 'UsersController');

});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('posts', 'PostsController');

});

Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Route::resource('users', 'UserController');

});

Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Route::resource('posts', 'PostsController');

});

Route::namespace('Posts')->group(function(){
    Route::resource('posts', 'PostsController');

});


Route::namespace('Comments')->group(function(){
    Route::resource('comments', 'CommentController');

});


//----- Redirection lors d'une connexion avec google
Route::get('/auth/google', 'Auth\GoogleController@redirect');
Route::get('/auth/google/callback', 'Auth\GoogleController@callback');

//----- Redirection lors d'une connexion avec github
Route::get('/auth/github', 'Auth\GithubController@redirect');
Route::get('/auth/github/callback', 'Auth\GithubController@callback');
