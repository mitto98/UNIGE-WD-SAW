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

Route::prefix('course')->group(function () {
  Route::get('/{course}', 'CourseController@get');
});
