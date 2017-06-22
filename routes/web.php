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

Auth::routes();

Route::group([
    "prefix" => "admin/",
    "middleware" => "auth",
    "namespace" => "Admin"],
    function () {
    	Route::get('', 'AdminController@index')->name('home');
        Route::get('home', 'AdminController@index')->name('home');
        Route::get('logout', 'AdminController@logout');

        // Messages
        Route::resource('messages', 'MessagesController', ['except' => [
            'create', 'edit', 'update'
        ]]);

        // Newsletter
        Route::get('newsletter', 'AdminController@index');
        Route::get('newsletter/add', 'AdminController@index');
        Route::get('newsletter/edit/{id}', 'AdminController@index');

        // Actualites
        Route::get('actualite', 'AdminController@index');
        Route::get('actualite/add', 'AdminController@index');
        Route::get('actualite/edit/{id}', 'AdminController@index');

        // Page
        Route::get('page', 'AdminController@index');
        Route::get('page/add', 'AdminController@index');
        Route::get('page/edit/{id}', 'AdminController@index');

        // Subscribers
        Route::get('subscribers', 'AdminController@index');
        Route::get('subscribers/add', 'AdminController@index');
        Route::get('subscribers/edit/{id}', 'AdminController@index');
    }
);
		

Route::get('profil', 'ProfilController@index');
