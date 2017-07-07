<?php

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
Route::get('/', function () {
    return view('welcome');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/roles',['middleware'=>'role',function(){
	return "Roles Middleware";
}]);

Route::get('login/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\AuthController@getFacebookCallback');

Route::get('/{username}', 'ProfileController@show');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/follows/{username}', 'UserController@follows');
    Route::get('/unfollows/{username}', 'UserController@unfollows');
});