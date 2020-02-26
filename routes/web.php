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
    return view('welcome');
});

Route::get('hubungi', function () {
    return view('template_hubungi');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/add', 'UserController@create')->name('users.create');
    Route::post('/add', 'UserController@simpan')->name('users.store');
    Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::patch('/{id}/edit', 'UserController@update')->name('users.update');
    Route::delete('/{id}', 'UserController@destroy')->name('users.destroy');

});
