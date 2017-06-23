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
        Route::get('newsletter', 'NewslettersController@index');
        Route::get('newsletter/add', 'NewslettersController@store');
        Route::get('newsletter/edit/{id}', 'NewslettersController@index');

        // Actualites
        Route::get('news', 'NewsController@index');
        Route::get('news/add', 'NewsController@store');
        Route::get('news/edit/{id}', 'NewsController@index');

        // Page
        Route::get('page', 'PagesController@index');
        Route::get('page/add', 'PagesController@store');
        Route::get('page/edit/{id}', 'PagesController@index');

        // Subscribers
        Route::get('subscribers', 'AdminController@index');
        Route::get('subscribers/add', 'AdminController@index');
        Route::get('subscribers/edit/{id}', 'AdminController@index');
    }
);
		

Route::get('profil', 'ProfilController@index');
