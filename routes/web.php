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

Auth::routes();

Route::get('/', 'SiteController@index')->name('index');

Route::get('/books/download/{id}', 'SiteController@download')->name('download');
Route::get('/books/search', 'SiteController@download')->name('download');
Route::get('/authors', 'SiteController@authors')->name('authors');
Route::get('/authors/{id}', 'SiteController@showAuthor')->name('show.author');
Route::get('/categories', 'SiteController@categories')->name('categories');

Route::group(['middleware' => 'auth','namespace' => 'Admin','prefix'=>'admin'], function()
{
    Route::resources([
        'books' => 'BookController',
        'authors' => 'AuthorController',
        'categories' => 'CategoryController'
    ],
        ['except' => ['show', 'index']]
    );
});
