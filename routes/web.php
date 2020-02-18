<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/registration.php', 'TestController@registration');
Route::post('/login.php', 'TestController@login');
Route::get('/show_profile.php', 'TestController@showProfile');
Route::post('/update_profile.php', 'TestController@updateProfile');
Route::get('/logout.php', 'TestController@logout');
Route::get('/{any}', 'Controller@index')->where('any', '^((?!(api|test.html|[.]*.php)).)*$');
