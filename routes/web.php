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

// Admin Routes
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
        Route::resource('messages', 'MessagesController', ['except' => ['create', 'edit', 'update']]);
        Route::post('messages/{id}', 'MessagesController@trash')->name('messages.trash');
        Route::get('messages-trashed', 'MessagesController@showTrashed')->name('messages.trashed');

        // Abonnés Newsletter
        Route::resource('newsletters', 'NewslettersController', ['only' => ['destroy']]);
        Route::get('newsletters', 'NewslettersController@index')->name('newsletters.index');

        // Actualites
        Route::resource('news', 'NewsController', ['except' => ['show']]);
        Route::post('news/{id}/trash', 'NewsController@trash')->name('news.trash');
        Route::post('news/{id}/restore', 'NewsController@restore')->name('news.restore');

        // Catégories
        Route::resource('categories', 'CategoriesController', ['except' => ['create', 'show']]);

        // Page
        Route::resource('pages', 'PagesController', ['except' => ['show']]);
        Route::post('pages/{id}/trash', 'PagesController@trash')->name('pages.trash');
        Route::post('pages/{id}/restore', 'PagesController@restore')->name('pages.restore');

        // Subscribers
        Route::resource('subscribers', 'SubscribersController');
    }
);
// Front Routes

Route::group([
    "namespace" => "Front"],
    function () {
        // Home
        Route::get('/', 'HomeController@index');

        // About
        Route::get('/{slug}', 'HomeController@render');
    }
);


