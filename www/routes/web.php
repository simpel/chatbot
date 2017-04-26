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



Route::get('/anvandare/{user}', 'UserController@edit'); //show user profile
Route::post('/anvandare/{user}', 'UserController@update'); //update user profile
Route::post('/anvandare/{user}/avsluta', 'UserController@destroy'); //update user profile



Route::get('/api/meddelande', 'MessageController@index');
Route::post('/api/meddelande', 'MessageController@store');
Route::post('/api/bot', 'BotController@store');
Route::delete('/api/meddelande/tabort/{message}', 'MessageController@destroy'); //show message history

Route::post('api/skapakonto', 'RegistrationController@store'); //store the new user
Route::post('api/loggain', 'SessionController@create'); //login the user
Route::post('api/loggaut', 'SessionController@destroy'); //logout the user