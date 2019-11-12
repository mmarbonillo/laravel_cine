<?php

/*Route::get('/', function(){
    return view('user/login');
})->name('login');*/
Route::get('user', 'UserController@index')->name('user.index');
Route::get('user/', 'UserController@index')->name('user.index');
Route::post('user', 'UserController@store')->name('user.store');
Route::get('user/create', 'UserController@create')->name('user.create');
/*Route::get('user/{id}', 'UserController@show')->name('user.show');*/
Route::get('user/{id}/delete', 'UserController@destroy')->name('user.destroy');
Route::put('user/editar', 'UserController@update')->name('user.update');
Route::get('user/{id}/editar', 'UserController@edit')->name('user.edit');

//MOVIES
//Route::get('movies', 'MovieController@index')->name('movie.index'); //no funciona por algún motivo
Route::get('movies/home', 'MovieController@index')->name('movie.index');
Route::get('movies/new', 'MovieController@create')->name('movie.create');
Route::post('movies', 'MovieController@store')->name('movie.store');
Route::get('movies/{id}/show', 'MovieController@show')->name('movie.show');
Route::get('movies/{id}/edit', 'MovieController@edit')->name('movie.edit');
Route::put('movies/{id}/update', 'MovieController@update')->name('movie.update');
Route::get('movies/{id}/delete', 'MovieController@destroy')->name('movie.destroy');

Genre::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
