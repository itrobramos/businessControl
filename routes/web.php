<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Clients
Route::get('/clients', 'ClientController@index');
Route::get('/clients/create',"ClientController@create");
Route::get('/clients/{id}/edit', "ClientController@edit");
Route::get('/clients/{id}/details', "ClientController@details");
Route::post('/clients', 'ClientController@store');
Route::patch('/clients/{id}','ClientController@update');
Route::delete('/clients/{id}', 'ClientController@destroy');


Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

