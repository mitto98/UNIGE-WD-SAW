<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('area')->group(function () {
  Route::get('/', 'AreaController@index');
  Route::get('/{area}', 'AreaController@get');
});
