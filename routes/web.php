<?php

Route::get('/', function () {
    return response()->json([
        'user' => [
            'id'  => 1,
            'name' => 'Jacob Balabanov',
            'thoughts' => [
                [
                    'id' => 1,
                    'description' => 'I think I should change my strategy with negotiating over the business',
                    'labels'      => 'general, business'
                ],[
                    'id' => 2,
                    'description' => 'I should eat eggs for breakfast',
                    'labels'      => 'life style, food'
                ],[
                    'id' => 3,
                    'description' => 'Fix the problem with smilealot interface',
                    'labels'      => 'work, simlealot'
                ]
            ]
        ]
    ]);
});

//
////AUTH
//Auth::routes();

////Thoughts API
//Route::group([
//    'prefix'     => 'api',
//    'middleware' => 'auth'
//], function () {
//    Route::resource('{user}/thoughts', 'ThoughtsController');
//});
