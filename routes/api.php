<?php

use Illuminate\Http\Request;

Route::prefix('user')->group(function () {
    Route::middleware('auth:api')->get('/', 'UserController@current');

    Route::post('/register', 'UserController@register');

    Route::post('/reset', 'UserController@reset');
    Route::get('/reset/{token}', 'UserController@hasReset');
    Route::post('/reset/{token}', 'UserController@doReset');
    Route::get('/all', 'UserController@getUsers');

});

Route::prefix('area')->group(function () {
  Route::get('/', 'AreaController@index');
  Route::get('/{area}', 'AreaController@get');
});

Route::prefix('course/{course}')->group(function () {
  Route::get('/', 'CourseController@get');
  Route::get('/ratings_bar', 'CourseController@getRatings');

  Route::prefix('/comments')->group(function () {
      Route::get('/', 'CommentController@getComments');
      Route::put('/', 'CommentController@store');

      Route::prefix('/{commment}')->group(function () {
          Route::post('/', 'CommentController@update');
          Route::delete('/', 'CommentController@delete');
      });
  });
});

Route::middleware('auth:api')->prefix('chat/{user}')->group(function () {
    Route::get('/', 'MessageController@getMessages');
    Route::put('/', 'MessageController@save');
    Route::delete('/{message}', 'MessageController@delete');
});
