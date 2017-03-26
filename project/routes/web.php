<?php

Auth::routes();

Route::get('/', 'StartController@index');

Route::get('/api/messages/{thread_id}', 'MessageController@index');
Route::post('/api/messages/', 'MessageController@store');
