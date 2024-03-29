<?php

use Illuminate\Http\Request;

Route::prefix('user')->group(function () {
    Route::middleware('auth:api')->group(function () {
        Route::get('/', 'UserController@current');

        Route::put('/update', 'UserController@updateData');
        Route::put('/change-password', 'UserController@updatePassword');
    });

    Route::post('/register', 'UserController@register');

    Route::post('/reset', 'UserController@reset');
    Route::get('/reset/{token}', 'UserController@hasReset');
    Route::post('/reset/{token}', 'UserController@doReset');
    Route::get('/all', 'UserController@getUsers');

});

Route::get('send-newsletter', 'Controller@sendNewsletter');

Route::prefix('area')->group(function () {
  Route::get('/', 'AreaController@index');
  Route::get('/{area}', 'AreaController@get');
});

Route::prefix('course/{course}')->group(function () {
  Route::get('/', 'CourseController@get');
  Route::get('/ratings_bar', 'CourseController@getRatings');

  Route::prefix('/comments')->group(function () {
      Route::get('/', 'CommentController@getComments');
      Route::middleware('auth:api')->put('/', 'CommentController@store');

      Route::middleware('auth:api')->prefix('/{commment}')->group(function () {
          Route::post('/', 'CommentController@update');
          Route::delete('/', 'CommentController@delete');
      });
  });
});

Route::middleware('auth:api')->prefix('chat/{user}')->group(function () {
    Route::get('/', 'MessageController@getMessages');
    Route::put('/', 'MessageController@create');
    Route::delete('/{message}', 'MessageController@delete');
});
