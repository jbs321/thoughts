<?php

Route::get('/', function () {
    return view('welcome');
});

//AUTH
Auth::routes();

//Thoughts API
Route::group([
    'prefix'     => 'api',
    'middleware' => 'auth'
], function () {
    Route::resource('{user}/thoughts', 'ThoughtsController');
});
