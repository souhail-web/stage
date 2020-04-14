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


Auth::routes();

/* Renvoie vers la page d'accueil */
Route::get('/', 'HomeController@index')->name('accueil');

/* Renvoie vers la page "About" */
Route::get('About','HomeController@indexAbout')->name('aboutPage');

/* Renvoie vers le formulaire de contact */
Route::get('Contact','ContactController@index')->name('contactPage');
Route::post('Contact', 'ContactController@traitement');

/* Renvoie vers la page de login */
Route::get('/Login', 'HomeController@index');


Route::get('/home', 'HomeController@index')->name('home');


//----- Création de l'espace admin.users ------//
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('users', 'UsersController');

});


//----- Création de l'espace admin.posts ------//
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('posts', 'PostsController');

});

//----- Création de l'espace user.user ------//
Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Route::resource('users', 'UserController');

});

//----- Création des routes pour reset le userpassword ------//
Route::get('/user/password/{user}','User\UserController@password')->name('user.users.password');
Route::put('/user/password/{user}','User\UserController@password_store')->name('user.users.password_store');


//----- Création de l'espace user.posts ------//
Route::namespace('User')->prefix('user')->name('user.')->group(function(){
    Route::resource('posts', 'PostsController');

});

//----- Création de l'espace posts ------//
Route::namespace('Posts')->group(function(){
    Route::resource('posts', 'PostsController');

});

//----- Création de l'espace commentaire ------//
Route::namespace('Comments')->group(function(){
    Route::resource('comments', 'CommentController');

});


//----- Redirection lors d'une connexion avec google ------//
Route::get('/auth/google', 'Auth\GoogleController@redirect');
Route::get('/auth/google/callback', 'Auth\GoogleController@callback');

//----- Redirection lors d'une connexion avec github ------//
Route::get('/auth/github', 'Auth\GithubController@redirect');
Route::get('/auth/github/callback', 'Auth\GithubController@callback');

//----- Redirection lors d'une connexion avec facebook ------//
Route::get('/auth/facebook', 'Auth\FacebookController@redirect');
Route::get('/auth/facebook/callback', 'Auth\FacebookController@callback');
