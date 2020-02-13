<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('area')->group(function () {
  Route::get('/', 'AreaController@index');
  Route::get('/{area}', 'AreaController@get');
});

Route::prefix('course')->group(function () {
  Route::get('/{course}', 'CourseController@get');
  Route::prefix('/{course}/comments','CommentController@index');
});

