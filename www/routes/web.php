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

Route::get('/', 'BasicPagesController@start')->name('start');
Route::get('/om', 'BasicPagesController@about')->name('about');
Route::get('/kontakt', 'ContactController@index')->name('contact'); //show contacts page incl. form
Route::post('/kontakt', 'ContactController@store'); //post contact form

Route::get('/skapakonto', 'RegistrationController@create'); //show form for creating a user
Route::post('/skapakonto', 'RegistrationController@store'); //store the new user

Route::get('/anvandare/{user}', 'UserController@edit'); //show user profile
Route::post('/anvandare/{user}', 'UserController@update'); //update user profile
Route::post('/anvandare/{user}/avsluta', 'UserController@destroy'); //update user profile

Route::get('/loggain', 'SessionController@create'); //login the user
Route::get('/loggaut', 'SessionController@destroy'); //logout the user

Route::get('/api/meddelande', 'MessageController@index');
Route::post('/api/meddelande', 'MessageController@store');
Route::post('/api/bot/', 'WitController@store'); //post new message
Route::delete('/api/meddelande/{message}', 'MessageController@destroy'); //show message history