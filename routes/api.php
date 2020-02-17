<?php

use Illuminate\Http\Request;

Route::prefix('user')->group(function () {
    Route::middleware('auth:api')->get('/', function (Request $request) {
        return $request->user();
    });

    Route::post('/register', 'UserController@register');
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

