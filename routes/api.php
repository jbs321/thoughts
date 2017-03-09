<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('{user}', 'ThoughtsController@index');

Route::get('{user}/{thought}', 'ThoughtsController@show');

Route::post('/', function () {
    return "Hello Mister";
});
