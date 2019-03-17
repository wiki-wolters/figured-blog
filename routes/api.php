<?php

//Getting posts is public
Route::get('/posts', 'PostController@index');

//Creating, updating and deleting requires authentication
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/post/create', 'PostController@store');
    Route::get('/post/{id}', 'PostController@edit');
    Route::put('/post/{id}', 'PostController@update');
    Route::delete('/post/{id}', 'PostController@delete');
});
