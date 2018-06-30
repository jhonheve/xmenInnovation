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

Route::get('/', 'WelcomeController@index');
// Route::get('/', function () {
	
    // return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/application', 'ApplicationController@store')->name("sendRequest");

Route::resource('dashboard', 'DashboardController');

Route::get('/dashboard/{id}', function ($id) {
    return $id;
});
