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
Route::get('user/{id}/logout', 'UserController@logout')->name('user.logout');

//MOVIES
//Route::get('movies', 'MovieController@index')->name('movie.index'); //no funciona por algún motivo
Route::get('movies/home', 'MovieController@index')->name('movie.index');
Route::get('movies/new', 'MovieController@create')->name('movie.create');
Route::post('movies/store', 'MovieController@store')->name('movie.store');
Route::get('movies/{id}/show', 'MovieController@show')->name('movie.show');
Route::get('movies/{id}/edit', 'MovieController@edit')->name('movie.edit');
Route::put('movies/{id}/update', 'MovieController@update')->name('movie.update');
Route::get('movies/{id}/delete', 'MovieController@destroy')->name('movie.destroy');
Route::get('movie/delete', 'MovieController@delete')->name('movie.delete');
Route::get('movies/admin', 'MovieController@admin');

Route::get('genre/prueba', 'GenreController@prueba')->name('genre.prueba');
Route::get('genre/add', 'GenreController@add')->name('genre.add');
Route::get('genre/all', 'GenreController@all')->name('genre.all');
Route::get('genre/new', 'GenreController@new')->name('genre.new');
Route::post('genre/delete', 'GenreController@destroy')->name('genre.delete');
Route::resource('genre', 'GenreController', [
    'names' => [
        'index' => 'genre.index',
        'store' => 'genre.store',
        'create' => 'genre.create',
        'show' => 'genre.show',
        //'destroy' => 'genre.destroy',
        'update' => 'genre.update',
        'edit' => 'genre.edit',
    ]]);

Route::resource('people', 'PeopleController', [
    'names' => [
        'index' => 'people.index',
        'store' => 'people.store',
        'create' => 'people.create',
        'show' => 'people.show',
        //'destroy' => 'people.destroy',
        'update' => 'people.update',
        'edit' => 'people.edit',
    ]]);


//LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
