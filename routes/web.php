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

Route::get('/', function () {
    return view('login');
});

Route::get('me', 'AlumnoController@index');

Route::get('videos', function(){
	return view('videos');
});

Route::resource('activity', 'ActivityController');
Route::get('excuse/create', 'ExcuseController@store');
Route::get('/print','ActivityController@print');
Auth::routes();
