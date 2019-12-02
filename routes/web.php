<?php

/*Route::get('/', function(){
    return view('user/login');
})->name('login');*/
Route::get('user', 'UserController@index')->name('user.index');
Route::get('user/', 'UserController@index')->name('user.index');
Route::post('user', 'UserController@store')->name('user.store');
Route::post('user/create', 'UserController@create')->name('user.create');
Route::get('user/show', 'UserController@show')->name('user.show');
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
Route::get('movie/addCast', 'MovieController@addCast')->name('movie.addCast');
Route::get('movie/addDirectors', 'MovieController@addDirectors')->name('movie.addDirectors');
Route::get('movies/admin', 'MovieController@admin');
Route::get('movies/view', 'MovieController@view')->name('movie.view');

Route::get('genre/prueba', 'GenreController@prueba')->name('genre.prueba');
Route::get('genre/add', 'GenreController@add')->name('genre.add');
Route::get('genre/all', 'GenreController@all')->name('genre.all');
Route::get('genre/all2', 'GenreController@all2')->name('genre.alll');
Route::get('genre/new', 'GenreController@new')->name('genre.new');
Route::get('genre/edit', 'GenreController@modify')->name('genre.modify');
Route::get('genre/destroy/{genres}', 'GenreController@destroy')->name('genre.delete');
Route::resource('genre', 'GenreController', [
    'names' => [
        'index' => 'genre.index',
        'store' => 'genre.store',
        'create' => 'genre.create',
        'show' => 'genre.show',
        //'destroy' => 'genre.destroy',
        'update' => 'genre.update',
        //'edit' => 'genre.edit',
    ]]);


Route::get('people/search', 'PeopleController@search')->name('people.search');
Route::get('people/searchCast', 'PeopleController@searchCast')->name('people.searchCast');
Route::get('people/searchDirectors', 'PeopleController@searchDirectors')->name('people.searchDirectors');
Route::get('people/showw/{cast}', 'PeopleController@show')->name('people.showw');
Route::get('people/delete/{id}', 'PeopleController@destroy')->name('people.destroy');
Route::post('people/new', 'PeopleController@new')->name('people.new');
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
