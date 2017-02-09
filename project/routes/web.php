<?php



Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/dialogue/post', 'Dialogue@post');
Route::post('/api/dialogue/converse', 'Dialogue@converse');
