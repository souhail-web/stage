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
Route::get('/', 'HomeController@index');

Route::get('Articles', 'PostsController@index' ) ;

Route::get('Contact','ContactController@index');

Route::post('Contact', 'ContactController@traitement');

Route::get('/Articles/{id}', 'PostsController@show');

Route::post('/Articles/{id}', 'CommentController@traitement');


//Auth::routes(['register' => false]);
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


