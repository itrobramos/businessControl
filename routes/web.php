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


// Companies
Route::get('/companies', 'CompanyController@index');
Route::get('/companies/create',"CompanyController@create");
Route::get('/companies/{id}/edit', "CompanyController@edit");
Route::get('/companies/{id}/details', "CompanyController@details");
Route::post('/companies', 'CompanyController@store');
Route::patch('/companies/{id}','CompanyController@update');
Route::delete('/companies/{id}', 'CompanyController@destroy');

//Consultant
Route::get('/consultants', 'ConsultantController@index');
Route::get('/consultants/create',"ConsultantController@create");
Route::get('/consultants/{id}/edit', "ConsultantController@edit");
Route::get('/consultants/{id}/details', "ConsultantController@details");
Route::post('/consultants', 'ConsultantController@store');
Route::patch('/consultants/{id}','ConsultantController@update');
Route::delete('/consultants/{id}', 'ConsultantController@destroy');


Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

